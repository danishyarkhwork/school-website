<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Certificate::query();

        // Search functionality
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Filter by verification status
        if ($request->filled('status')) {
            if ($request->status === 'verified') {
                $query->verified();
            } elseif ($request->status === 'unverified') {
                $query->unverified();
            }
        }

        $certificates = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certificates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'student_id' => 'required|string|max:255|unique:certificates,student_id',
            'course_id' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
            'nic_number' => 'required|string|max:255|unique:certificates,nic_number',
            'graduation_date' => 'required|date',
            'teacher_name' => 'required|string|max:255',
        ]);

        // Generate unique certificate ID
        $validated['certificate_id'] = Certificate::generateCertificateId();

        // Create certificate
        $certificate = Certificate::create($validated);

        // Generate QR code
        $this->generateQrCode($certificate);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        return view('admin.certificates.show', compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'student_id' => 'required|string|max:255|unique:certificates,student_id,' . $certificate->id,
            'course_id' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
            'nic_number' => 'required|string|max:255|unique:certificates,nic_number,' . $certificate->id,
            'graduation_date' => 'required|date',
            'teacher_name' => 'required|string|max:255',
        ]);

        $certificate->update($validated);

        // Regenerate QR code if needed
        $this->generateQrCode($certificate);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        // Delete QR code image if exists
        if ($certificate->qr_code_image && Storage::exists($certificate->qr_code_image)) {
            Storage::delete($certificate->qr_code_image);
        }

        $certificate->delete();

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate deleted successfully!');
    }

    /**
     * Generate QR code for certificate
     */
    private function generateQrCode(Certificate $certificate)
    {
        $qrCodeData = $certificate->generateQrCodeData();

        // Generate QR code as SVG
        $qrCodeSvg = QrCode::size(200)
            ->format('svg')
            ->generate($qrCodeData);

        // Save QR code to storage
        $fileName = 'qr_codes/' . $certificate->certificate_id . '.svg';
        Storage::put('public/' . $fileName, $qrCodeSvg);

        // Update certificate with QR code data
        $certificate->update([
            'qr_code' => $qrCodeData,
            'qr_code_image' => $fileName,
        ]);
    }

    /**
     * Download certificate as PDF
     */
    public function downloadPdf(Certificate $certificate)
    {
        // This will be implemented when we add PDF generation
        return response()->json(['message' => 'PDF download will be implemented']);
    }

    /**
     * Regenerate QR code for certificate
     */
    public function regenerateQrCode(Certificate $certificate)
    {
        $this->generateQrCode($certificate);

        return redirect()->back()
            ->with('success', 'QR code regenerated successfully!');
    }
}

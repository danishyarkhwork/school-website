<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::orderBy('created_at', 'desc')->paginate(10);
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
        $validator = Validator::make($request->all(), [
            'student_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'student_id' => 'required|string|max:255',
            'course_id' => 'required|string|max:255',
            'nic_number' => 'required|string|max:255',
            'graduation_date' => 'required|date',
            'teacher_name' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $certificate = Certificate::create([
            'certificate_id' => Certificate::generateCertificateId(),
            'student_name' => $request->student_name,
            'father_name' => $request->father_name,
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
            'nic_number' => $request->nic_number,
            'graduation_date' => $request->graduation_date,
            'teacher_name' => $request->teacher_name,
            'course_name' => $request->course_name,
            'is_verified' => true,
        ]);

        // Generate QR code data
        $certificate->generateQrCodeData();

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
        $validator = Validator::make($request->all(), [
            'student_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'student_id' => 'required|string|max:255',
            'course_id' => 'required|string|max:255',
            'nic_number' => 'required|string|max:255',
            'graduation_date' => 'required|date',
            'teacher_name' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
            'is_verified' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $certificate->update($request->all());

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate deleted successfully!');
    }

    /**
     * Generate QR code image for the certificate and save to public assets
     */
    public function generateQr(Certificate $certificate)
    {
        // Ensure qr_code_data exists and is up-to-date
        $data = $certificate->qr_code_data ?: $certificate->generateQrCodeData();

        // We will not save to disk; only stream as download

        try {
            // Generate PNG bytes locally using Simple QrCode
            $png = QrCode::format('png')
                ->size(600)
                ->margin(1)
                ->errorCorrection('M')
                ->generate($data);

            $filename = $certificate->certificate_id . '.png';

            // Stream direct download
            return response($png, 200, [
                'Content-Type' => 'image/png',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
            ]);
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to generate QR code. Please try again.');
        }
    }
}

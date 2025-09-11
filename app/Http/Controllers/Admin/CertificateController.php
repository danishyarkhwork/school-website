<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
}

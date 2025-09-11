<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateVerificationController extends Controller
{
    /**
     * Show the certificate verification search page
     */
    public function index()
    {
        return view('certificate.verify');
    }

    /**
     * Verify a certificate by ID
     */
    public function verify(Request $request)
    {
        $request->validate([
            'certificate_id' => 'required|string'
        ]);

        $certificate = Certificate::where('certificate_id', $request->certificate_id)->first();

        if (!$certificate) {
            return redirect()->route('certificate.verify')
                ->with('error', 'Certificate not found. Please check the certificate ID and try again.');
        }

        return view('certificate.result', compact('certificate'));
    }

    /**
     * Show certificate verification result by direct ID access
     */
    public function show($id)
    {
        $certificate = Certificate::where('certificate_id', $id)->first();

        if (!$certificate) {
            return view('certificate.not-found', ['certificate_id' => $id]);
        }

        return view('certificate.result', compact('certificate'));
    }

    /**
     * Search certificates (for admin or API use)
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        if (!$query) {
            return response()->json(['error' => 'Search query is required'], 400);
        }

        $certificates = Certificate::where('certificate_id', 'like', "%{$query}%")
            ->orWhere('student_name', 'like', "%{$query}%")
            ->orWhere('student_id', 'like', "%{$query}%")
            ->orWhere('nic_number', 'like', "%{$query}%")
            ->limit(10)
            ->get(['certificate_id', 'student_name', 'student_id', 'graduation_date']);

        return response()->json($certificates);
    }
}
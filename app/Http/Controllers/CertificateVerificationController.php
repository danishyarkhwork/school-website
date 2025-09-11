<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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
     * Verify certificate by ID
     */
    public function verify(Request $request)
    {
        $request->validate([
            'certificate_id' => 'required|string'
        ]);

        $certificate = Certificate::where('certificate_id', $request->certificate_id)->first();

        if (!$certificate) {
            return view('certificate.result', [
                'found' => false,
                'message' => 'Certificate not found. Please check the certificate ID and try again.'
            ]);
        }

        // Mark as verified if not already verified
        if (!$certificate->is_verified) {
            $certificate->markAsVerified(
                $request->ip(),
                'Verified via website search'
            );
        }

        return view('certificate.result', [
            'found' => true,
            'certificate' => $certificate
        ]);
    }

    /**
     * Verify certificate by ID (for direct URL access)
     */
    public function verifyById(string $id)
    {
        $certificate = Certificate::where('certificate_id', $id)->first();

        if (!$certificate) {
            return view('certificate.result', [
                'found' => false,
                'message' => 'Certificate not found. Please check the certificate ID and try again.'
            ]);
        }

        // Mark as verified if not already verified
        if (!$certificate->is_verified) {
            $certificate->markAsVerified(
                request()->ip(),
                'Verified via QR code scan'
            );
        }

        return view('certificate.result', [
            'found' => true,
            'certificate' => $certificate
        ]);
    }

    /**
     * API endpoint for QR code verification
     */
    public function apiVerify(Request $request): JsonResponse
    {
        $request->validate([
            'certificate_id' => 'required|string'
        ]);

        $certificate = Certificate::where('certificate_id', $request->certificate_id)->first();

        if (!$certificate) {
            return response()->json([
                'success' => false,
                'message' => 'Certificate not found'
            ], 404);
        }

        // Mark as verified if not already verified
        if (!$certificate->is_verified) {
            $certificate->markAsVerified(
                $request->ip(),
                'Verified via API/QR scan'
            );
        }

        return response()->json([
            'success' => true,
            'certificate' => [
                'certificate_id' => $certificate->certificate_id,
                'student_name' => $certificate->student_name,
                'father_name' => $certificate->father_name,
                'course_name' => $certificate->course_name,
                'graduation_date' => $certificate->formatted_graduation_date,
                'teacher_name' => $certificate->teacher_name,
                'is_verified' => $certificate->is_verified,
                'verified_at' => $certificate->verified_at?->format('Y-m-d H:i:s'),
            ]
        ]);
    }

    /**
     * Search certificates (for admin or advanced search)
     */
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|min:3'
        ]);

        $certificates = Certificate::search($request->search)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('certificate.search-results', compact('certificates'));
    }

    /**
     * Get certificate statistics
     */
    public function statistics(): JsonResponse
    {
        $total = Certificate::count();
        $verified = Certificate::verified()->count();
        $unverified = Certificate::unverified()->count();

        return response()->json([
            'total_certificates' => $total,
            'verified_certificates' => $verified,
            'unverified_certificates' => $unverified,
            'verification_rate' => $total > 0 ? round(($verified / $total) * 100, 2) : 0
        ]);
    }
}

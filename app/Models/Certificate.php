<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_id',
        'student_name',
        'father_name',
        'student_id',
        'course_id',
        'nic_number',
        'graduation_date',
        'teacher_name',
        'course_name',
        'is_verified',
        'qr_code_data'
    ];

    protected $casts = [
        'graduation_date' => 'date',
        'is_verified' => 'boolean',
    ];

    /**
     * Generate a unique certificate ID
     */
    public static function generateCertificateId()
    {
        do {
            $certificateId = 'CERT-' . strtoupper(uniqid());
        } while (self::where('certificate_id', $certificateId)->exists());

        return $certificateId;
    }

    /**
     * Generate QR code data for the certificate
     */
    public function generateQrCodeData()
    {
        $verificationUrl = route('certificate.verify', ['id' => $this->certificate_id]);
        $this->qr_code_data = $verificationUrl;
        $this->save();
        return $verificationUrl;
    }
}

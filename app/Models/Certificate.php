<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Certificate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'certificate_id',
        'student_name',
        'father_name',
        'student_id',
        'course_id',
        'course_name',
        'nic_number',
        'graduation_date',
        'teacher_name',
        'qr_code',
        'qr_code_image',
        'is_verified',
        'verified_at',
        'verified_by',
        'verification_notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'graduation_date' => 'date',
        'verified_at' => 'datetime',
        'is_verified' => 'boolean',
    ];

    /**
     * Generate a unique certificate ID
     */
    public static function generateCertificateId(): string
    {
        do {
            $certificateId = 'CERT-' . strtoupper(uniqid());
        } while (self::where('certificate_id', $certificateId)->exists());

        return $certificateId;
    }

    /**
     * Generate QR code data for the certificate
     */
    public function generateQrCodeData(): string
    {
        return route('certificate.verify', ['id' => $this->certificate_id]);
    }

    /**
     * Mark certificate as verified
     */
    public function markAsVerified(string $verifiedBy = null, string $notes = null): void
    {
        $this->update([
            'is_verified' => true,
            'verified_at' => now(),
            'verified_by' => $verifiedBy ?? request()->ip(),
            'verification_notes' => $notes,
        ]);
    }

    /**
     * Get formatted graduation date
     */
    public function getFormattedGraduationDateAttribute(): string
    {
        return $this->graduation_date->format('F d, Y');
    }

    /**
     * Get verification status badge
     */
    public function getVerificationStatusAttribute(): string
    {
        return $this->is_verified ? 'Verified' : 'Not Verified';
    }

    /**
     * Get verification status color
     */
    public function getVerificationStatusColorAttribute(): string
    {
        return $this->is_verified ? 'green' : 'red';
    }

    /**
     * Scope for verified certificates
     */
    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    /**
     * Scope for unverified certificates
     */
    public function scopeUnverified($query)
    {
        return $query->where('is_verified', false);
    }

    /**
     * Scope for searching certificates
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('certificate_id', 'like', "%{$search}%")
                ->orWhere('student_name', 'like', "%{$search}%")
                ->orWhere('student_id', 'like', "%{$search}%")
                ->orWhere('nic_number', 'like', "%{$search}%")
                ->orWhere('course_name', 'like', "%{$search}%");
        });
    }
}

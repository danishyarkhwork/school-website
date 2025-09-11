<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_id')->unique();
            $table->string('student_name');
            $table->string('father_name');
            $table->string('student_id')->unique();
            $table->string('course_id');
            $table->string('course_name');
            $table->string('nic_number')->unique();
            $table->date('graduation_date');
            $table->string('teacher_name');
            $table->string('qr_code')->nullable();
            $table->string('qr_code_image')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->string('verified_by')->nullable();
            $table->text('verification_notes')->nullable();
            $table->timestamps();

            // Indexes for better performance
            $table->index('certificate_id');
            $table->index('student_id');
            $table->index('nic_number');
            $table->index('graduation_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};

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
            $table->string('student_id');
            $table->string('course_id');
            $table->string('nic_number');
            $table->date('graduation_date');
            $table->string('teacher_name');
            $table->string('course_name');
            $table->boolean('is_verified')->default(true);
            $table->text('qr_code_data')->nullable();
            $table->timestamps();
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

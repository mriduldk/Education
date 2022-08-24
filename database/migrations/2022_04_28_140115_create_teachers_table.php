<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_id')->unique();
            $table->string('teacher_no')->unique();
            $table->string('fk_school_id');
            $table->string('teacher_employee_code')->nullable();
            $table->string('teacher_first_name')->nullable();
            $table->string('teacher_last_name')->nullable();
            $table->string('teacher_gender')->nullable();
            $table->string('teacher_dob')->nullable();
            $table->string('teacher_caste')->nullable();
            $table->string('teacher_religion')->nullable();
            $table->string('teacher_nationality')->nullable();
            $table->string('teacher_present_address')->nullable();
            $table->string('teacher_parmanent_address')->nullable();
            $table->string('teacher_aadhaar_no')->nullable();
            $table->string('teacher_mobile')->unique()->nullable();
            $table->string('teacher_email')->unique();
            $table->string('teacher_password')->nullable();
            $table->string('teacher_mother_name')->nullable();
            $table->string('teacher_father_name')->nullable();
            $table->string('teacher_identification_mark')->nullable();
            $table->string('teacher_blood_group')->nullable();
            $table->string('teacher_differntly_abled')->nullable();
            $table->string('teacher_maritial_status')->nullable();
            $table->string('teacher_spouse_name')->nullable();
            $table->boolean('teacher_spouse_working_under_govt_serveice')->nullable();
            $table->string('teacher_language')->nullable();
            $table->string('teacher_tet_category')->nullable();
            $table->string('teacher_category_type')->nullable();
            $table->longText('teacher_image_url')->nullable();
            $table->longText('teacher_signature_url')->nullable();
            $table->longText('teacher_pan_url')->nullable();
            $table->longText('teacher_aadhaar_url')->nullable();
            $table->boolean('is_head_teacher')->default(false);
            $table->timestamp('created_on');
            $table->string('created_by')->nullable();
            $table->dateTime('modified_on')->nullable();
            $table->string('modified_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->string('deleted_by')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_deleted')->default(false);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('fk_school_id')
                ->references('school_id')
                ->on('schools')
                ->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};

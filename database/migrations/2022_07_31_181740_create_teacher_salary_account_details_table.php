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
        Schema::create('teacher_salary_account_details', function (Blueprint $table) {
            $table->id();
            $table->string('teacehr_s_d_id')->unique();
            $table->string('fk_teacher_id')->unique();
            $table->string('pan_no')->nullable();
            $table->string('account_no')->nullable();
            $table->string('account_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('ifsc')->nullable();
            $table->string('district_name_of_active_salary_account_no')->nullable();
            $table->string('state_name_of_active_salary_account_no')->nullable();
            $table->string('salary_payment_mode')->nullable();
            $table->string('gross_provoded_fund')->nullable();
            $table->string('group_insurance_scheme')->nullable();
            $table->dateTime('created_on')->nullable();
            $table->string('created_by')->nullable();
            $table->dateTime('modified_on')->nullable();
            $table->string('modified_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();

            $table->foreign('fk_teacher_id')
                ->references('teacher_id')
                ->on('teachers')
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
        Schema::dropIfExists('teacher_salary_account_details');
    }
};

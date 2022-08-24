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
        Schema::create('teacher_service_details', function (Blueprint $table) {
            $table->id();
            $table->string('teacehr_s_d_id')->unique();
            $table->string('fk_teacher_id');
            $table->string('employeement_type', 50)->nullable();
            $table->string('pran_no', 50)->nullable();
            $table->string('uan_no', 50)->nullable();
            $table->string('ssa_contactual_appointment_order_no', 50)->nullable();
            $table->string('retention_no', 50)->nullable();
            $table->string('service_confirmed', 100)->nullable();
            $table->string('post_name')->nullable();
            $table->string('medium_of_school')->nullable();
            $table->string('subjects')->nullable();
            $table->string('category_of_post')->nullable();
            $table->string('pay_scale')->nullable();
            $table->string('grade_pay')->nullable();
            $table->string('appointment_latter_no')->nullable();
            $table->string('appointment_date')->nullable();
            $table->string('post_creation_no')->nullable();
            $table->string('post_creation_date')->nullable();
            $table->string('date_of_effect_of_service_provincialisation')->nullable();
            $table->string('date_of_joining_in_service')->nullable();
            $table->string('date_of_joining_in_present_post')->nullable();
            $table->string('date_of_retirement')->nullable();
            $table->string('period_spent_on_non_teaching_assignment')->nullable();
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
        Schema::dropIfExists('teacher_service_details');
    }
};

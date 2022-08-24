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
        Schema::create('school_student_details', function (Blueprint $table) {
            $table->id();
            $table->string('school_sd_id')->unique();
            $table->string('fk_school_id');
            $table->string('class', 30)->nullable();
            $table->integer('total_student')->nullable();
            $table->integer('total_male_student')->nullable();
            $table->integer('total_female_student')->nullable();
            $table->integer('general')->nullable();
            $table->integer('sc')->nullable();
            $table->integer('st')->nullable();
            $table->integer('obc')->nullable();
            $table->integer('minority')->nullable();
            $table->integer('bpl')->nullable();
            $table->integer('tea_tribe')->nullable();
            $table->integer('others')->nullable();
            $table->integer('students_having_aadhaar_card')->nullable();
            $table->integer('students_having_bank_account')->nullable();
            $table->integer('pwd_cwsc')->nullable();
            $table->integer('average_age')->nullable();
            $table->timestamp('created_on');
            $table->string('created_by');
            $table->dateTime('modified_on')->nullable();
            $table->string('modified_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->string('deleted_by')->nullable();
            $table->boolean('is_deleted')->default(false);
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
        Schema::dropIfExists('school_student_details');
    }
};

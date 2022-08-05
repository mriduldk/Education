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
        Schema::create('teacher_academic_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('teacehr_a_q_id')->unique();
            $table->string('fk_teacher_id')->unique();
            $table->string('qualification')->nullable();
            $table->string('stream_displine')->nullable();
            $table->string('subjects_studied')->nullable();
            $table->string('board_university')->nullable();
            $table->string('school_college')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('marks_obtained')->nullable();
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
        Schema::dropIfExists('teacher_academic_qualifications');
    }
};

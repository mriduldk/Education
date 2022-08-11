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
        Schema::create('teacher_leaves', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_leave_id')->unique();
            $table->string('fk_teacher_id');
            $table->string('fk_school_id');
            $table->string('fk_head_teacher_id');
            $table->string('leave_date_from')->nullable();
            $table->string('leave_date_to')->nullable();
            $table->string('leave_subject')->nullable();
            $table->text('leave_message')->nullable();
            $table->string('leave_application_image')->nullable();
            $table->boolean('is_only_uploaded_application')->default(false);
            $table->string('status')->default('Pending');
            $table->string('remarks')->nullable();
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

            $table->foreign('fk_teacher_id')
                ->references('teacher_id')
                ->on('teachers')
                ->onDelete('restrict');

            $table->foreign('fk_school_id')
                ->references('school_id')
                ->on('schools')
                ->onDelete('restrict');

            $table->foreign('fk_head_teacher_id')
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
        Schema::dropIfExists('teacher_leaves');
    }
};

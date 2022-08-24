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
        Schema::create('teacher_transfers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_t_id', 36)->unique();
            $table->string('fk_teacher_id', 36);
            $table->string('fk_old_school_id', 36);
            $table->string('fk_new_school_id', 36);
            $table->date('transfer_date')->nullable();
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

            $table->foreign('fk_old_school_id')
                ->references('school_id')
                ->on('schools')
                ->onDelete('restrict');

            $table->foreign('fk_new_school_id')
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
        Schema::dropIfExists('teacher_transfers');
    }
};
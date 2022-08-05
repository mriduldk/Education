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
        Schema::create('teacher_dependent_families', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_d_f_id')->unique();
            $table->string('fk_teacher_id')->unique();
            $table->string('name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('relationship')->nullable();
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
        Schema::dropIfExists('teacher_dependent_families');
    }
};

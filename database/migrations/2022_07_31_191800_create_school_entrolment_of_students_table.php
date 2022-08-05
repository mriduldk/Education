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
        Schema::create('school_entrolment_of_students', function (Blueprint $table) {
            $table->id();
            $table->string('school_e_o_s_id')->unique();
            $table->string('fk_school_id')->unique();
            $table->integer('pre_primary')->nullable();
            $table->integer('class_1')->nullable();
            $table->integer('class_2')->nullable();
            $table->integer('class_3')->nullable();
            $table->integer('class_4')->nullable();
            $table->integer('class_5')->nullable();
            $table->integer('class_6')->nullable();
            $table->integer('class_7')->nullable();
            $table->integer('class_8')->nullable();
            $table->integer('class_9')->nullable();
            $table->integer('class_10')->nullable();
            $table->integer('class_11')->nullable();
            $table->integer('class_12')->nullable();
            $table->integer('class_1_12')->nullable();
            $table->integer('class_1_12_with_pre_primary')->nullable();
            $table->integer('total_teachers')->nullable();
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
        Schema::dropIfExists('school_entrolment_of_students');
    }
};

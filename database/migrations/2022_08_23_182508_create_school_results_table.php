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
        Schema::create('school_results', function (Blueprint $table) {
            $table->id();
            $table->string('school_r_id')->unique();
            $table->string('fk_school_id');
            $table->string('class', 30)->nullable();
            $table->string('stream', 30)->nullable();
            $table->string('year', 30)->nullable();
            $table->integer('fst_division')->nullable();
            $table->integer('snd_division')->nullable();
            $table->integer('trd_visision')->nullable();
            $table->integer('fail')->nullable();
            $table->integer('total_appeared')->nullable();
            $table->integer('distinction')->nullable();
            $table->integer('star')->nullable();
            $table->dateTime('created_on')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('school_results');
    }
};

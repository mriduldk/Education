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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('school_id')->unique();
            $table->string('school_name')->nullable();
            $table->string('udice_code')->unique();
            $table->string('village')->nullable();
            $table->string('cluster')->nullable();
            $table->string('block')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('pin')->nullable();
            $table->string('class_from')->nullable();
            $table->string('class_to')->nullable();
            $table->string('school_type')->nullable();
            $table->string('school_category')->nullable();
            $table->string('school_medium')->nullable();
            $table->string('state_management')->nullable();
            $table->string('national_management')->nullable();
            $table->string('status')->nullable();
            $table->string('location')->nullable();
            $table->string('aff_board_sec')->nullable();
            $table->string('add_board_h_sec')->nullable();
            $table->string('year_of_establishment')->nullable();
            $table->string('pre_primary')->nullable();
            $table->integer('class_rooms')->nullable();
            $table->integer('other_rooms')->nullable();
            $table->timestamp('created_on');
            $table->string('created_by');
            $table->dateTime('modified_on')->nullable();
            $table->string('modified_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->string('deleted_by')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
};

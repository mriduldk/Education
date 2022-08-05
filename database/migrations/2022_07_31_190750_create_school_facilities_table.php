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
        Schema::create('school_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('school_f_id')->unique();
            $table->string('fk_school_id')->unique();
            $table->string('building_status')->nullable();
            $table->string('coundary_wall')->nullable();
            $table->integer('no_of_boys_toilets')->nullable();
            $table->integer('no_of_girls_toilets')->nullable();
            $table->integer('no_of_cwsn_toilets')->nullable();
            $table->boolean('drinking_water_availability')->nullable();
            $table->boolean('hand_wash_facility')->nullable();
            $table->integer('functional_generator')->nullable();
            $table->boolean('library')->nullable();
            $table->boolean('reading_corner')->nullable();
            $table->boolean('book_bank')->nullable();
            $table->integer('functional_laptop')->nullable();
            $table->integer('functional_desktop')->nullable();
            $table->integer('functional_tablet')->nullable();
            $table->integer('functional_scanner')->nullable();
            $table->integer('functional_printer')->nullable();
            $table->integer('functional_led')->nullable();
            $table->integer('functional_digiboard')->nullable();
            $table->boolean('internet')->nullable();
            $table->boolean('dth')->nullable();
            $table->integer('functional_web_cam')->nullable();
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
        Schema::dropIfExists('school_facilities');
    }
};

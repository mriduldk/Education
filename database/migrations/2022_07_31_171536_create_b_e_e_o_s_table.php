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
        Schema::create('b_e_e_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('beeo_id')->unique();
            $table->string('beeo_name')->nullable();
            $table->string('beeo_phone')->unique();
            $table->string('beeo_email')->unique();
            $table->string('beeo_image_url')->nullable();
            $table->string('beeo_office_name')->nullable();
            $table->string('beeo_office_address')->nullable();
            $table->string('beeo_dictrict')->nullable();
            $table->string('beeo_block')->nullable();
            $table->string('beeo_password')->nullable();
            $table->timestamp('created_on');
            $table->string('created_by');
            $table->dateTime('modified_on')->nullable();
            $table->string('modified_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->string('deleted_by')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('b_e_e_o_s');
    }
};

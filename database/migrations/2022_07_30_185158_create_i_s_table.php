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
        Schema::create('i_s', function (Blueprint $table) {
            $table->id();
            $table->string('is_id')->unique();
            $table->string('is_no')->unique();
            $table->string('is_name')->nullable();
            $table->string('is_phone')->unique();
            $table->string('is_email')->unique();
            $table->string('is_image_url')->nullable();
            $table->string('is_office_name')->nullable();
            $table->string('is_office_address')->nullable();
            $table->string('is_dictrict')->nullable();
            $table->string('is_password')->nullable();
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
        Schema::dropIfExists('i_s');
    }
};

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
        Schema::create('d_m_c_s', function (Blueprint $table) {
            $table->id();
            $table->string('dmc_id')->unique();
            $table->string('dmc_no')->unique();
            $table->string('dmc_name')->nullable();
            $table->string('dmc_phone')->unique();
            $table->string('dmc_email')->unique();
            $table->string('dmc_image_url')->nullable();
            $table->string('dmc_office_name')->nullable();
            $table->string('dmc_office_address')->nullable();
            $table->string('dmc_dictrict')->nullable();
            $table->string('dmc_password')->nullable();
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
        Schema::dropIfExists('d_m_c_s');
    }
};

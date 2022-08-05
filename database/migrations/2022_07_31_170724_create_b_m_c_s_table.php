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
        Schema::create('b_m_c_s', function (Blueprint $table) {
            $table->id();
            $table->string('bmc_id')->unique();
            $table->string('bmc_name')->nullable();
            $table->string('bmc_phone')->unique();
            $table->string('bmc_email')->unique();
            $table->string('bmc_image_url')->nullable();
            $table->string('bmc_office_name')->nullable();
            $table->string('bmc_office_address')->nullable();
            $table->string('bmc_dictrict')->nullable();
            $table->string('bmc_block')->nullable();
            $table->string('bmc_password')->nullable();
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
        Schema::dropIfExists('b_m_c_s');
    }
};

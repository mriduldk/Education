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
        Schema::create('d_e_e_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('deeo_id')->unique();
            $table->string('deeo_no')->unique();
            $table->string('deeo_name')->nullable();
            $table->string('deeo_phone')->unique();
            $table->string('deeo_email')->unique();
            $table->string('deeo_image_url')->nullable();
            $table->string('deeo_office_name')->nullable();
            $table->string('deeo_office_address')->nullable();
            $table->string('deeo_dictrict')->nullable();
            $table->string('deeo_password')->nullable();
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
        Schema::dropIfExists('d_e_e_o_s');
    }
};

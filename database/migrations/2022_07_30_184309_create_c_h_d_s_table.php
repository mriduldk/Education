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
        Schema::create('c_h_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('chd_id')->unique();
            $table->string('chd_name')->nullable();
            $table->string('chd_phone')->unique();
            $table->string('chd_email')->unique();
            $table->string('chd_image_url')->nullable();
            $table->string('chd_password')->nullable();
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
        Schema::dropIfExists('c_h_d_s');
    }
};

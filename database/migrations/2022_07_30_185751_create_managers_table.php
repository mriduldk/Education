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
        Schema::create('managers', function (Blueprint $table) {
            $table->id();
            $table->string('manager_id')->unique();
            $table->string('manager_name')->nullable();
            $table->string('manager_phone')->unique();
            $table->string('manager_email')->unique();
            $table->string('manager_image_url')->nullable();
            $table->string('manager_office_name')->nullable();
            $table->string('manager_office_address')->nullable();
            $table->string('manager_dictrict')->nullable();
            $table->string('manager_password')->nullable();
            $table->tinyInteger('manager_type')->default(0);
            /* Users: 0=>IS, 1=>DPC, 2=>DMC, 3=>DEFO */
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
        Schema::dropIfExists('managers');
    }
};

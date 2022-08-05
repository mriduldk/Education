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
        Schema::create('approvers', function (Blueprint $table) {
            $table->id();
            $table->string('approver_id')->unique();
            $table->string('approver_name')->nullable();
            $table->string('approver_phone')->unique();
            $table->string('approver_email')->unique();
            $table->string('approver_image_url')->nullable();
            $table->string('approver_office_name')->nullable();
            $table->string('approver_office_address')->nullable();
            $table->string('approver_dictrict')->nullable();
            $table->string('approver_password')->nullable();
            $table->tinyInteger('approver_type')->default(0);
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
        Schema::dropIfExists('approvers');
    }
};

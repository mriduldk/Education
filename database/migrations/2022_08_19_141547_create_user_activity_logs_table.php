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
        Schema::create('user_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('user_al_id')->unique();
            $table->string('fk_user_id');
            $table->string('fk_action_taken_user_id')->nullable();
            $table->string('action_taken_user_name')->nullable();
            $table->dateTime('date_time')->nullable();
            $table->string('message')->nullable();
            $table->string('action')->nullable();
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
        Schema::dropIfExists('user_activity_logs');
    }
};

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
        Schema::create('login_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('login_al_id')->unique();
            $table->string('fk_user_id');
            $table->dateTime('login_date_time')->nullable();
            $table->string('login_message')->nullable();
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
        Schema::dropIfExists('login_activity_logs');
    }
};

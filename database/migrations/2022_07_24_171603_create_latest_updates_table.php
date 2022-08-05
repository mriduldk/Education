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
        Schema::create('latest_updates', function (Blueprint $table) {
            $table->id();
            $table->string('update_title');
            $table->text('update_desc');
            $table->string('doc');
            $table->string('date');
            $table->string('entrusted_dept');
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
        Schema::dropIfExists('latest_updates');
    }
};

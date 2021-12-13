<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogApps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_apps', function (Blueprint $table) {
            $table->id();
            $table->string('table');
            $table->unsignedBigInteger('userId');
            $table->string('log_path');
            $table->text('log_desc');
            $table->string('log_ip');
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
        Schema::dropIfExists('log_apps');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('nim')->nullable();
            $table->timestamps();
        });

        Schema::table('members', function (Blueprint $table) {
            $table->foreign('project_id')
            ->references('id')->on('projects')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('nim')
            ->references('nim')->on('students')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}

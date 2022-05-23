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
        Schema::create('bill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desk_id');
            $table->unsignedBigInteger('user_id');
            $table->string('time_in');
            $table->string('time_out');

            $table->foreign('desk_id') 
                ->references('id')->on('table')
                ->onUpdate('CASCADE');
            $table->foreign('user_id') 
                ->references('id')->on('users')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill');
    }
};

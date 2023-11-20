<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweety_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id_1');
            $table->unsignedBigInteger('person_id_2');
            $table->string('message');
            $table->timestamps();

            $table->foreign('person_id_1')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('person_id_2')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweety_messages');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRegistrationEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_registration_events', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('event_id_event')->unsigned();
            $table->integer('user_id_user')->unsigned();
            $table->timestamps();
        });
        Schema::table('user_registration_events',function (Blueprint $table) {
            $table->foreign('event_id_event')->references('id')
                ->on('events')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('user_registration_events',function (Blueprint $table){
            $table->foreign('user_id_user')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('user_registration_events');
    }
}

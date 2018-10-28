<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('date_initial')->nullable();
            $table->string('date_finish')->nullable();
            $table->string('local')->nullable();
            $table->string('time')->nullable();
            $table->string('time_expiration')->nullable();
            $table->string('city')->nullable();
            $table->integer('vacancies')->nullable();
            $table->string('target_audience')->nullable();
            $table->integer('arquivo')->unsigned();
            $table->timestamps();
        });

        Schema::table('events', function(Blueprint $table) {
            $table->foreign('arquivo')->references('id')->on('file_entries')
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
        Schema::dropIfExists('events');
    }
}

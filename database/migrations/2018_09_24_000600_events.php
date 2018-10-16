<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   /** nome,descricao,
        *data de inicio,data de termino,local,
        *horario de inicio, 
        *horario de termino, 
        *cidade,vagas, 
        *publico alvo,
        *arquivo */
        Schema::create('events', function (Blueprint $table) {
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

            $table->foreign('arquivo')
                ->references('id')->on('file_entries')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}

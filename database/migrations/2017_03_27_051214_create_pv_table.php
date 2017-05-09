<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pv', function (Blueprint $table) {
            $table->increments('deviceId');
            $table->float('Temp');
            $table->float('Humidity');
            $table->float('Irr');
            $table->float('Vmp');
            $table->float('Imp');
            $table->float('Voltage');
            $table->float('Current');
            $table->float('Power');
            $table->string('Status');
            $table->float('Lat');
            $table->float('Lng');
            $table->string('Time');
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
        Schema::dropIfExists('pv');
    }
}

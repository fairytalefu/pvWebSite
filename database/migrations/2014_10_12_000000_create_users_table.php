<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Name')->unique();
            $table->string('Avatar');
            $table->integer('Age');
            $table->string('Gender');
            $table->string('Email')->unique();
            $table->string('password');
            $table->string('PhoneNumber')->nullable();
            $table->string('Address')->nullable();
            $table->string('Api_key')->nullable();
            $table->string('Api_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

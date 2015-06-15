<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_usuarios', function($table){
            $table->increments('id_user');
            $table->string('user_name', 32);
            $table->string('user_email', 320);
            $table->string('user_pass', 64);
            $table->string('remember_token', 100)->nullable();
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
        Schema::drop('tb_usuarios');
    }
}

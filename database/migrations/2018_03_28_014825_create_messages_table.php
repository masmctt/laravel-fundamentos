<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //para crear nueva tabla php artisan make:migration create_messages_table
    //para crear nueva tabla versiones anteriores  php artisan make:migration create_messages_table --create:messages
    //Para creat un cambio en la tabla sin perder datos
    //php artisan make:migration alter_messages_table --table=messages
    //se modifica el archivo creado y se ejecuta
    //php artisan migrate
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('email',100)->nullable();
            $table->text('mensaje');
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('messages');
    }
}

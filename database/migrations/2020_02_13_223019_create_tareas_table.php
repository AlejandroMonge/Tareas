<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreTarea');
            $table->date('fechaInicio');
            $table->date('fechaTermino');
            $table->text('descripcion');
            $table->unsignedBigInteger('categoriaId');//FK
            //$table->bigInteger('categoriaId')->unisigned();
            $table->smallInteger('prioridad')->unsigned();
            $table->string('status');
            $table->boolean('terminada');
            $table->unsignedBigInteger('userId');//FK
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
        Schema::dropIfExists('tareas');
    }
}

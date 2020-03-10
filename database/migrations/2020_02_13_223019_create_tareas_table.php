<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Psy\debug;

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
            $table->smallInteger('prioridad')->unsigned();
            $table->string('status')->default("Iniciada");
            $table->boolean('terminada')->default(0);
            $table->timestamps();

            //FK
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('user_id');


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

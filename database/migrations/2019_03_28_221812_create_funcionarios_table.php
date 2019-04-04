<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('cargo');
        });

        Schema::create('documento_funcionario', function (Blueprint $table) {
            $table->unsignedInteger('documento_id');
            $table->unsignedInteger('funcionario_id');

            $table->foreign('documento_id')
                ->references('id')
                ->on('documentos')
                ->onDelete('cascade');
            $table->foreign('funcionario_id')
                ->references('id')
                ->on('funcionarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento_funcionario');
        Schema::dropIfExists('funcionarios');
    }
}

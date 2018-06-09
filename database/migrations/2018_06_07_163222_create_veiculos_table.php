<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa',20)->unique();
            $table->string('renavam',20);
            $table->string('modelo',20);
            $table->string('marca',20);
            $table->addColumn("integer", "ano",['length' => 4]);
            $table->addColumn("integer", "proprietario");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}

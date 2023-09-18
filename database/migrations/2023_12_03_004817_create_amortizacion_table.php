<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmortizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amortizacion', function (Blueprint $table) {
            $table->bigIncrements('id_amortizacion');
            $table->unsignedBigInteger('num_credito');
            $table->integer('numero_pagos');
            $table->date('prox_pago');
            $table->bigInteger('interes_anual');
            $table->integer('pag_capital');
            $table->integer('interes_ordinarios');
            $table->integer('iva_io');
            $table->integer('comisiones');
            $table->integer('pago_total_men');
            $table->boolean('cobro')->default(false);
            $table->timestamps();

            $table->foreign('num_credito')->references('num_credito')
            ->on('credito');
        });
        
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amortizacion');
    }
}

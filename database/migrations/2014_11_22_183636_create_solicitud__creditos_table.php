<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_creditos', function (Blueprint $table) {
            $table->bigIncrements('id_solicitud');
            $table->integer('monto');
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('estado')->
            comment('0:Crédito en revisión, 1:Falta información que completar o es incorrecta,
             2:Línea de crédito rechazada, 3:Línea de crédito aprobada')->default('0');
            $table->text('mensaje')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('documentacion')->nullable();
            $table->date('fecha_solicitud');
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
        Schema::dropIfExists('solicitud_creditos');
    }
}

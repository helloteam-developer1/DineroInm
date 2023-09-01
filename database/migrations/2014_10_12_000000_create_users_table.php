<?php

use Brick\Math\BigInteger;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('curp');
            $table->date('fecha_nacimiento');
            $table->string('empresa_trabajo'); 
            $table->string('rama_empresa');
            $table->string('antiguedad');
            $table->string('banco_nomina');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefono_contacto');
            $table->string('direccion')->nullable();
            $table->string('ine_frente')->nullable();
            $table->string('ine_reverso')->nullable(); 
            $table->string('comp_dom')->nullable(); 
            $table->string('foto_cine')->nullable();
            $table->string('prestamo');
            $table->string('tiempo');
            $table->string('trabajo');
            $table->string('ingreso');
            $table->string('nomina');
            $table->string('credito');
            $table->string('tarjeta_reg')->nullable()->default(null);
            $table->string('num_cliente')->nullable()->default(null);
            $table->boolean('rol')->default(0);
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

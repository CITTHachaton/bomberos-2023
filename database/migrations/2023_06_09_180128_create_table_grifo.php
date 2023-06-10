<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grifo', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('nombre');
            $table->string('descripcion');
            $table->json('ubicacion')->nullable();
            $table->integer('estado')->default(1); 
            //1 pendiente, 2 disponible, 3 con problemas, 4 en reparacion, 5 deshabilitado, 6 eliminado, 7 reportado

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
        Schema::dropIfExists('grifo');
    }
};

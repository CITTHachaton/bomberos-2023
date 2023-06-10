<?php

use App\Services\GrifoJsonToClass;
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
            $table->string('codigo')->nullable();
            //1 pendiente, 2 disponible, 3 con problemas, 4 en reparacion, 5 deshabilitado, 6 eliminado, 7 reportado
            $table->string('nombre')->nullable();
            $table->string('anio')->nullable();
            $table->string('c_sr_ap')->nullable();
            $table->string('diam_grifo')->nullable();
            $table->string('editor')->nullable();
            $table->string('estado')->nullable();
            $table->string('fecha_arreglo')->nullable();
            $table->string('fecha_creacion')->nullable();
            $table->string('fecha_edicion')->nullable();
            $table->string('field_1')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('owner')->nullable();
            $table->string('shape')->nullable();
            $table->string('ubicacion')->nullable();
            $table->double('latitud')->nullable();
            $table->double('longitud')->nullable();

            $table->integer('estatus')->default(1);
            $table->timestamps();
        });

        (new GrifoJsonToClass())->import();

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

<?php

use App\Services\BomberoJsonToClass;
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
        Schema::create('bombero', function (Blueprint $table) {
            $table->id();
            //1 pendiente, 2 disponible, 3 con problemas, 4 en reparacion, 5 deshabilitado, 6 eliminado, 7 reportado
            $table->string('nombre')->nullable();
            $table->double('latitud')->nullable();
            $table->double('longitud')->nullable();
            $table->integer('estatus')->default(1);
            $table->timestamps();
        });
        (new BomberoJsonToClass())->import();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bombero');
    }
};

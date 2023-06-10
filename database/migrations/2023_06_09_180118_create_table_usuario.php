<?php

use App\Models\Usuario;
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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('password',256);
            $table->string('cargo')->nullable();
            $table->integer('estado')->default(0);
            $table->timestamps();
        });


        $u = new Usuario();
        $u->nombre = "Benjamin";
        $u->correo = "benja@gmail.com";
        $u->password = "123123";
        $u->cargo = "Bombero";
        $u->save();

        $u = new Usuario();
        $u->nombre = "Carlos";
        $u->correo = "carlos@gmail.com";
        $u->password = "123123";
        $u->cargo = "Capitan Bombero";
        $u->save();

        $u = new Usuario();
        $u->nombre = "Leonardo";
        $u->correo = "leonardo@gmail.com";
        $u->password = "123123";
        $u->cargo = "Bombero";
        $u->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
};

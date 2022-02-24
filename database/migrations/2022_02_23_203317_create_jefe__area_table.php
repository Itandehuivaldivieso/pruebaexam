<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJefeAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jefe__area', function (Blueprint $table) {
            $table->id("id_Jefe_Area");
            $table->string("nombre_Area");
            $table->unsignedInteger('id_Persona')->nullable();
            $table->foreign('id_Persona')->references('id_Persona')->on('persona')->onDelete('cascade');
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
        Schema::dropIfExists('jefe__area');
    }
}

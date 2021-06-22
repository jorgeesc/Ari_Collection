<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoriaAddImg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categorias',function(Blueprint $table){
        $table->string('imgNombreVirtual')->nullable();
        $table->string('imgNombreFisico')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categorias',function(Blueprint $table){
        $table->dropColumn('imgNombreVirtual');
        $table->dropColumn('imgNombreFisico');
        });
    }
}
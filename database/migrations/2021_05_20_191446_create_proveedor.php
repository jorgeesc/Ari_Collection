<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono',128);
            $table->timestamps();
        });

        Schema::table('productos', function (Blueprint $table){
            $table->unsignedBigInteger('proveedor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos',function(Blueprint $table){
            $table->dropColumn('provedor_id');
        });

        Schema::dropIfExists('proveedor');
    }
}

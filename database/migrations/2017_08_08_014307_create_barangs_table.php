<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jenis')->unsigned();
            $table->string('nama');
            $table->string('foto');
            $table->integer('stock');
            $table->integer('harga_asli');
            $table->integer('harga_jual');
            $table->timestamps();

            $table->foreign('id_jenis')->references('id')->on('jenis_barangs')
                ->onUpdate('cascade')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}

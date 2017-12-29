<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jenis')->unsigned();
            $table->integer('id_barang')->unsigned();
            $table->integer('jumlah');
            $table->integer('total');
            $table->date('tgl_penjualan');
            $table->timestamps();

          
            $table->foreign('id_jenis')->references('id')->on('jenis_barangs')
                ->onUpdate('cascade')->onDelete('cascade');    
            $table->foreign('id_barang')->references('id')->on('barangs')
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
        Schema::dropIfExists('penjualans');
    }
}

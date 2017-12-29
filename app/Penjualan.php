<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //
     protected $fillable = ['id_jenis','id_barang','jumlah','total','tgl_penjualan'];

    public function jenis(){
    	return $this->belongsTo('App\JenisBarang');
    }
    public function barang(){
    	return $this->belongsTo('App\Barang');
    }
}

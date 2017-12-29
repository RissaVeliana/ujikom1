<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    //
    protected $fillable = ['id_supplier','id_jenis','id_barang','jumlah','total','tgl_pembelian'];

    public function supplier(){
    	return $this->belongsTo('App\Supplier');
    }     
    public function jenis(){
    	return $this->belongsTo('App\JenisBarang');
    }
    public function barang(){
    	return $this->belongsTo('App\Barang');
    }
}

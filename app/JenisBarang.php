<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    //
    protected $table ='jenis_barangs';
    protected $fillable = ['jenis'];


    public function barang(){
    	return $this->hasMany('App\Barang');
    }
 	public function pembelian(){
    	return $this->hasMany('App\Pembelian');
    }
 	public function penjualan(){
    	return $this->hasMany('App\Penjualan');
    }
          
}

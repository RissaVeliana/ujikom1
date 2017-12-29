<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
     protected $fillable = ['nama_supplier','alamat','no_hp'];


    public function pembelian(){
    	return $this->hasMany('App\Pembelian');
    }
 	
}

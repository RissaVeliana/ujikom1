<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use DB;
use App\JenisBarang;
use App\Barang;
use Session;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $penjualan = DB::table('penjualans')
        ->join('jenis_barangs','penjualans.id_jenis','=','jenis_barangs.id')
        ->join('barangs','penjualans.id_barang','=','barangs.id')
        ->select('penjualans.*','jenis_barangs.jenis','barangs.nama',
            'barangs.harga_jual')
        ->get();
        return view('penjualan.index',compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $b = JenisBarang::all();
        $c = Barang::all();
        return view('penjualan.create', compact('b','c'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $barang = Barang::findorFail($request->nb);
        if($barang->stock >= $request->jml)
        {
        $penjualan = new Penjualan();
        $penjualan->id_jenis=$request->jb;
        $penjualan->id_barang=$request->nb;
        $penjualan->jumlah=$request->jml;
        $total = $request->jml*$barang->harga_jual;
        $penjualan->total=$total;
        $penjualan->tgl_penjualan=$request->tgl;    
        $penjualan->save();
        $barang->stock=$barang->stock-$request->jml;
        $barang->save();
        }

        else{
            Session::flash("flash_notification",[
                 "level"=>"danger",
                 "message"=>"jumlah penjualan melebihi stock"]);
            return redirect('/admin/penjualan/create');
        }
            

        return redirect('/admin/penjualan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $penjualan = Penjualan::findorFail($id);
        $b = JenisBarang::all();
        $c = Barang::all();
        return view('penjualan.edit', compact('penjualan','b','c'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $harga = Barang::findorFail($request->nb);
        $penjualan = Penjualan::findorFail($id);
        $penjualan->id_jenis=$request->jb;
        $penjualan->id_barang=$request->nb;
        $penjualan->jumlah=$request->jml;
        $total = $request->jml*$harga->harga_asli;
        $penjualan->total=$total;
        $penjualan->tgl_penjualan=$request->tgl;    
        $penjualan->save();
        return redirect('/admin/pembelian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $penjualan= Penjualan::findOrfail($id);
        $penjualan->delete();
        return redirect()->route('penjualan.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembelian;
use DB;
use App\Supplier;
use App\JenisBarang;
use App\Barang;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pembelian = DB::table('pembelians')
        ->join('suppliers','pembelians.id_supplier','=','suppliers.id')
        ->join('jenis_barangs','pembelians.id_jenis','=','jenis_barangs.id')
        ->join('barangs','pembelians.id_barang','=','barangs.id')
        ->select('pembelians.*','suppliers.nama_supplier','jenis_barangs.jenis','barangs.nama',
            'barangs.harga_asli')
        ->get();
        return view('pembelian.index',compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $a = Supplier::all();
        $b = JenisBarang::all();
        $c = Barang::all();
        return view('pembelian.create', compact('a','b','c'));
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
        $pembelian = new Pembelian();
        $pembelian->id_supplier=$request->ns;
        $pembelian->id_jenis=$request->jb;
        $pembelian->id_barang=$request->nb;
        $pembelian->jumlah=$request->jml;
        $total = $request->jml*$barang->harga_asli;
        $pembelian->total=$total;
        $pembelian->tgl_pembelian=$request->tgl;    
        $pembelian->save();
        $barang->stock=$barang->stock+$request->jml;
        $barang->save();
        
        return redirect('/admin/pembelian');
       
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
        $f = Pembelian::findorFail($id);
        $a = Supplier::all();
        $b = JenisBarang::all();
        $c = Barang::all();
        return view('pembelian.edit', compact('f','a','b','c'));
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
        $barang= Barang::findorFail($request->nb);
        $pembelian = Pembelian::findorFail($id);
        $pembelian->id_supplier=$request->ns;
        $pembelian->id_jenis=$request->jb;
        $pembelian->id_barang=$request->nb;
        $pembelian->jumlah=$request->jml;
        $total = $request->jml*$barang->harga_asli;
        $pembelian->total=$total;
        $pembelian->tgl_pembelian=$request->tgl;    
        $pembelian->save();
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
        $pembelian= Pembelian::findOrfail($id);
        $pembelian->delete();
        return redirect()->route('pembelian.index');
    }
}

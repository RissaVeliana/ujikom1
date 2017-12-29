<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\JenisBarang;
use DB;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang = DB::table('barangs')
        ->join('jenis_barangs','barangs.id_jenis','=','jenis_barangs.id')
        ->select('barangs.*','jenis_barangs.jenis')->get();
        return view('barang.index',compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barang = JenisBarang::all();
        return view('barang.create', compact('barang'));     

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
        $barang = new Barang();
        $barang->id_jenis=$request->jb;
        $barang->nama=$request->nama;  
        $barang->stock=$request->stock;
        $barang->harga_asli=$request->ha;
        $barang->harga_jual=$request->hj;    
         if ($request->hasFile('foto'))
    {
        $uploaded_cover = $request->file('foto');
        $extension = $uploaded_cover->getClientOriginalExtension();
        $filename = md5(time()) .'.'. $extension;
        $destinationPath = public_path().DIRECTORY_SEPARATOR.'img';
        $uploaded_cover->move($destinationPath, $filename);
        $barang->foto = $filename;
        $barang->save();
    }
        return redirect('/admin/barang');
        
       
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
        $barang = Barang::findOrFail($id);
        $jenis = JenisBarang::all();
        return view('barang.edit', compact('barang','jenis'));
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
        $barang =Barang::findOrFail($id);
        $barang->id_jenis=$request->jb;
        $barang->nama=$request->nama;
        $barang->stock=$request->stock;
        $barang->harga_asli=$request->ha;
        $barang->harga_jual=$request->hj;  
          if ($request->hasFile('foto'))
    {
        $uploaded_cover = $request->file('foto');
        $extension = $uploaded_cover->getClientOriginalExtension();
        $filename = md5(time()) .'.'. $extension;
        $destinationPath = public_path().DIRECTORY_SEPARATOR.'img';
        $uploaded_cover->move($destinationPath, $filename);
        $barang->foto = $filename;
        $barang->save();
    }
    return redirect('/admin/barang');
        
       
    
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
        $barang = Barang::findOrfail($id);
        $barang->delete();
        return redirect()->route('barang.index');
    }
}

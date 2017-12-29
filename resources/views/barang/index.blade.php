@extends('layouts.template')
@section('content')

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('img/admi.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li><a href="{{route('home')}}"><i class="glyphicon glyphicon-plus"></i> <span>Tambah Akun</span></a></li>
        <li><a href="{{route('jenis.index')}}"><i class="fa fa-cart-plus"></i> <span>Jenis Barang</span></a></li>
        <li class="active"><a href="{{route('barang.index')}}"><i class="fa fa-cubes"></i> <span>Barang</span></a></li>
 
        <li class="treeview">
         <a href="#">
        <i class="fa fa-map" aria-hidden="true"></i>
        <span>Transaksi</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
            <li><a href="{{route('pembelian.index')}}"><i class="fa fa-circle-o text-red"></i> pembelian</a></li>
            <li><a href="{{route('penjualan.index')}}"><i class="fa fa-circle-o text-success"></i> penjualan</a></li>
        </a>
        </li>
        
      
    </section>
    <!-- /.sidebar -->
  </aside>
<div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          
        
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <a href="{{route('barang.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true">  Tambah Barang</i></a>
              <h2 class="box-title">Daftar Barang</h2>

              <br>
              <h4>Silahkan Pilih Berdasarkan Jenis Barang</h4>
               @php
             $a = App\JenisBarang::all();
             @endphp

             <a href="{{route('barang.index')}}" class="btn btn-success">Semua</a>

             @foreach($a as $data)
             <a href="{{url('/filter',$data->id)}}" class="btn btn-warning">{{$data->jenis}}</a>
             @endforeach
            
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @foreach($barang as $data)
            <div class="col-md-3">
            <center>
              <img src="{{asset('img/'.$data->foto)}}" style="height: 140px">
              <h4>{{$data->nama}} ({{$data->stock}})</h4>
              <p>{{$data->jenis}}</p>       
             
               <form action="{{route('barang.destroy', $data->id)}}" method="post">
                <a class="btn btn-warning btn-xs" href="/admin/barang/{{$data->id}}/edit">Edit</a>
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#detail{{$data->id}}">  Detail
                </button>
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token">
                  <input type="submit" class="btn btn-danger btn-xs" value="delete">
                  {{csrf_field()}}
                </form>
              </center>
            
              <!-- Button trigger modal -->


        <!-- Modal -->
          <div class="modal fade" id="detail{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"           aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Detail Barang</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <td><h3>Jenis Barang</h3> {{$data->jenis}}</td>
            <h3>Merk Barang</h3> {{$data->nama}}
            <h3>Stok Barang</h3> {{$data->stock}}
            <h3>Harga Asli</h3> {{$data->harga_asli}}
            <h3>Harga jual</h3>   {{$data->harga_jual}}
              
            
            </div>
          </div>
          </div>
          </div>

            </div>
            @endforeach
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </section>
        
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
@endsection

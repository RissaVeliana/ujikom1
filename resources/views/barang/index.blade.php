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
        <li><a href="{{route('supplier.index')}}"><i class="glyphicon glyphicon-plus"></i> <span>Supplier</span></a></li>
        <li><a href="{{route('jenis.index')}}"><i class="fa fa-cart-plus"></i> <span>Jenis Barang</span></a></li>
        <li class="active"><a href="{{route('barang.index')}}"><i class="fa fa-cubes"></i> <span>Barang</span></a></li>
 
        <li class="treeview">
         <a href="#">
        <i class="fa fa-map" aria-hidden="true"></i>
        <span>Transaksi</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
            <ul class="treeview-menu">
            <li><a href="{{route('pembelian.index')}}"><i class="fa fa-circle-o text-red"></i> pembelian</a></li>
            <li><a href="{{route('penjualan.index')}}"><i class="fa fa-circle-o text-success"></i> penjualan</a></li>
          </ul>
          </a>
        </li>
      </ul>
          
      
    </section>
    <!-- /.sidebar -->
  </aside>
<div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
      
      <div class="row">
      
        <section class="col-lg-12">
          
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <a href="{{route('barang.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"> Tambah Barang</i></a>
              <h2 class="box-title">Daftar Barang</h2>

              <br>
              <h4>Silahkan Pilih Berdasarkan Jenis Barang</h4>
               @php
             $a = App\JenisBarang::all();
             @endphp

               <div class="box-header">
             <a href="{{route('barang.index')}}" class="btn btn-success">Semua</a>

             @foreach($a as $data)
             <a href="{{url('/filter',$data->id)}}" class="btn btn-danger">{{$data->jenis}}</a>
             @endforeach
            </div>
            </div>

           
            <div class="box-body">
            @foreach($barang as $data)
            <div class="col-md-3">
            <center>
              <img src="{{asset('img/'.$data->foto)}}" style="height: 140px">
              <h4>{{$data->nama}} ({{$data->stock}})</h4>
              <p>{{$data->jenis}}</p>       
               <form action="{{route('barang.destroy', $data->id)}}" method="post">
                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit{{$data->id}}">Edit
                </button>
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#detail{{$data->id}}">Detail
                </button>
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token">
                  <input type="submit" class="btn btn-danger btn-xs" value="delete">
                  {{csrf_field()}}
                </form>
              </center>
              </div>
            
             

        <!-- Modal Edit -->
          <div class="modal fade" id="edit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"           aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header btn-primary">
              <h4 class="modal-title" id="exampleModalLongTitle"><b>Edit Barang</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body btn-success">
            <form action="{{route('barang.update', $data->id)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
          <label class="control-lable">jenis Barang</label>
          <select class="form-control" name="jb" value="{{$data->id_jenis}}" required>
            @foreach($a as $datas)
            <option value="{{$datas->id}}" <?php if ($data->id_jenis==$datas->id) echo "select" ?>> {{$datas->jenis}}</option>
            @endforeach
          </select>
        </div>


        <div class="form-group">
          <label class="control-lable">Nama Barang</label>
          <input type="text" name="nama" class="form-control" value="{{$data->nama}}" required>
        </div>

        <div class="form-group">
                <label class="control-label">Foto</label><br>
                <img src="{{asset('img/'.$data->foto)}}"  width="120px" height="120px"> <br><br>
                <input type="file" name="foto" >
                
              </div>

        <div class="form-group">
          <label class="control-lable">Stock</label>
          <input type="text" name="stock" class="form-control" value="{{$data->stock}} " required>
        </div>


        <div class="form-group">
          <label class="control-lable">Harga Asli</label>
          <input type="text" name="ha" class="form-control" value="{{$data->harga_asli}}" required>
        </div>


        <div class="form-group">
          <label class="control-lable">Harga Jual</label>
          <input type="text" name="hj" class="form-control" value="{{$data->harga_jual}} " required>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>


        </form>
            </div>
          </div>
          </div>
          </div>

        <!-- Modal detail -->
          <div class="modal fade" id="detail{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"           aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header btn-primary">
              <h4 class="modal-title" id="exampleModalLongTitle"><b>Detail Barang</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body btn-success">
            <h4>Harga Asli</h4> {{$data->harga_asli}}
            <h4>Harga jual</h4>   {{$data->harga_jual}}
            </div>
          </div>
          </div>
          </div>

           
            @endforeach


          </div>

           
            </div>
        </section>
      </div>
   </section>
</div>
   
@endsection

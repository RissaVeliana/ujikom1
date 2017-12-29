@extends('layouts.template')
@section('content')


 <!-- Left side column. contains the logo and sidebar -->
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
        <li  class="active"><a href="{{route('barang.index')}}"><i class="fa fa-cubes"></i> <span>Barang</span></a></li>
 
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
        </li>
        
      
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <div class="row">
	<center><h1>Data Barang</h1><br></center>
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
		<div class="panel-heading"> Barang 
		<div class="panel-title pull-right">
			<a href="{{URL::previous()}} ">Kembali</a></div></div>

				<div class="panel-body">
				<form action="{{route('barang.update', $barang->id)}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{csrf_token()}}">

				<div class="form-group">
					<label class="control-lable">Merk Barang</label>
					<select class="form-control" name="jb">
						@foreach($jenis as $data)
						<option value="{{$data->id}}" selected="">{{$data->jenis}}</option>
						@endforeach
					</select>
				</div>


				<div class="form-group">
					<label class="control-lable">Nama Barang</label>
					<input type="text" name="nama" class="form-control" value="{{$barang->nama}}" required>
				</div>

        <div class="form-group">
                <label class="control-label">Foto</label><br>
                <img src="{{asset('img/'.$barang->foto)}}"  width="100px" height="120px"> <br><br>
                <input type="file" name="foto" >
                
              </div>

				<div class="form-group">
					<label class="control-lable">Stock</label>
					<input type="text" name="stock" class="form-control" value="{{$barang->stock}} " required>
				</div>


				<div class="form-group">
					<label class="control-lable">Harga Asli</label>
					<input type="text" name="ha" class="form-control" value="{{$barang->harga_asli}}" required>
				</div>


				<div class="form-group">
					<label class="control-lable">Harga Jual</label>
					<input type="text" name="hj" class="form-control" value="{{$barang->harga_jual}} " required>
				</div>




				<div class="form-group">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</div>


				</form>
				</div>
		</div>
	</div>
  </div>
  </div>

@endsection
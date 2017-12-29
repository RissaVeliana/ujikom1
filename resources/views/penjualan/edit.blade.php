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
        <li><a href="{{route('barang.index')}}"><i class="fa fa-cubes"></i> <span>Barang</span></a></li>
 
        <li class="treeview">
         <a href="#">
        <i class="fa fa-map" aria-hidden="true"></i>
        <span>Transaksi</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
            <li><a href="{{route('pembelian.index')}}"><i class="fa fa-circle-o text-red"></i> pembelian</a></li>
            <li  class="active"><a href="{{route('penjualan.index')}}"><i class="fa fa-circle-o text-success"></i> penjualan</a></li>
          
        </li>
        
      
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      
    </section>

<div class="row">
	<center><h1>Transaksi Penjualan</h1><br></center>
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
		<div class="panel-heading">  
		<div class="panel-title pull-right">
			<a href="{{URL::previous()}} ">Kembali</a></div></div>

			<div class="panel-body">
				<form action="{{route('penjualan.update', $penjualan->id)}}" method="post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				

				<div class="form-group">
					<label class="control-lable">Jenis Barang</label>
					<select class="form-control" name="jb">
						@foreach($b as $data)
						<option value="{{$data->id}}" selected="">{{$data->jenis}}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label class="control-lable">Merk Barang</label>
					<select class="form-control" name="nb">
						@foreach($c as $data)
						<option value="{{$data->id}}" selected="">{{$data->nama}}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label class="control-lable">Jumlah</label>
						<input type="number" name="jml"  max="100" value="{{$penjualan->jumlah}}" class="form-control" required>
					</div>
				
				<div class="form-group">
					<label class="control-lable">Tanggal Pembelian</label>
					<input type="date" name="tgl" class="form-control" value="{{$penjualan->tgl_penjualan}}" required>
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
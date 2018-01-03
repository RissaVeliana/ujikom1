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
        <li><a href="{{route('supplier.index')}}"><i class="glyphicon glyphicon-plus"></i> <span>Supplier</span></a></li>
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
<div class="row">
	<center><h1>Transaksi Penjualan</h1><br></center>
	<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading"> 
		<div class="panel-title pull-right">
			</div></div>
			<div class="panel-body">
				<table class="table">
				<a class="btn btn-info" href="{{route('penjualan.create')}}">Tambah Penjualan </a>
					<thead>
						<tr>
							<th>No</th>
							<th>Jenis Barang</th>
							<th>Merk Barang</th>
							<th>Jumlah</th>
							<th>Total Harga</th>
							<th>Tanggal Penjualan</th>
							<th colspan="2">Action</th>
							
						</tr>
					</thead>

					<tbody>
					<?php $no=1 ?>

					@foreach($penjualan as $data)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$data->jenis}}</td>
							<td>{{$data->nama}}</td>
							<td>{{$data->jumlah}}</td>
							<td>{{$data->total }}</td>
							<td>{{$data->tgl_penjualan}}</td>

							<td>
								<a class="btn btn-warning" href="/admin/penjualan/{{$data->id}}/edit">Edit</a></td>
								<td><form action="{{route('penjualan.destroy', $data->id)}}" method="post">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token">
									<input type="submit" class="btn btn-danger" value="delete">
									{{csrf_field()}}
								</form>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>

	</div>
		</div>
	</div>
	</section>
</div>
@endsection
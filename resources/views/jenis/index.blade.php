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
        <li class="active"><a href="{{route('jenis.index')}}"><i class="fa fa-cart-plus"></i> <span>Jenis Barang</span></a></li>
        <li><a href="{{route('barang.index')}}"><i class="fa fa-cubes"></i> <span>Barang</span></a></li>
 
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
        
      
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Button trigger modal -->


<!-- Modal -->


    <!-- Main content -->
    <section class="content">
    <div class="row">
	<center><h1>Data Jenis Barang</h1><br></center>
	<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading"> Jenis Barang
		<div class="panel-title pull-right">
			</div></div>
			<div class="panel-body">
     <div class="table-responsive">
     <table class="table">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true">  Tambah Data</i>
    </button>
						<thead>
						<tr>
							<th>No</th>
							<th>Jenis Barang</th>
							<th colspan="2">Action</th>
							
						</tr>
					</thead>

					<tbody>
					<?php $no=1; ?>
					@foreach($jenis as $data)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$data->jenis}}</td>
							<td>
                 <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$data->id}}"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit
                </button>
              </td>
								<td><form action="{{route('jenis.destroy', $data->id)}}" method="post">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token">
									<input type="submit" class="btn btn-danger" value="delete">
									{{csrf_field()}}
								</form>
							</td>
						</tr>

            <div class="modal fade" id="edit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Jenis Barang </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('jenis.update', $data->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    
                    <div class="form-group">
                      <label class="control-lable">Jenis Barang</label>
                      <input type="text" name="jenis" class="form-control" value="{{$data->jenis}} " required>
                    </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

					@endforeach
					</tbody>
				</table>
     	
     </div>
     </div>

	</div>
		</div>
	</div>
      

    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Barang </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('jenis.store')}}" method="post"> 
        {{csrf_field()}}

        <div class="form-group">
          <label class="control-lable">Jenis Barang</label>
          <input type="text" name="jenis" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
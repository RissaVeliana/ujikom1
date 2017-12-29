@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
	<center><h1>Data Supplier</h1><br></center>
	<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading"> Supplier
		<div class="panel-title pull-right">
			</div></div>
			<div class="panel-body">
				<table class="table">
				<a class="btn btn-info" href="{{route('supplier.create')}}">Tambah Data</a>
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>No Hp</th>
							<th colspan="2">Action</th>
							
						</tr>
					</thead>

					<tbody>
					<?php $no=1; ?>
					@foreach($supplier as $data)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$data->nama_supplier}}</td>
							<td>{{$data->alamat}}</td>
							<td>{{$data->no_hp}}</td>
							<td>
								<a class="btn btn-warning" href="/admin/supplier/{{$data->id}}/edit">Edit</a></td>
								<td><form action="{{route('supplier.destroy', $data->id)}}" method="post">
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
</div>
@endsection
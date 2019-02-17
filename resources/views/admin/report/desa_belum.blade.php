@extends('layouts.adminlte')

@section('content')
<!-- <div class="container"> -->
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">All Kecamatan</h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Kecamatan</th>
							<th>Total Formulir</th>
						</tr>
					</thead>
					<tbody>
						<?php $no =1; ?>
						@foreach($data_kec as $dt)
						<tr>
							<td>{{$no++}}</td>
							<td><a href="{{url('admin/report/desa')}}/{{$dt->id}}" role="button">{{$dt->name}}</a></td>
							<td>{{$dt->total_formulir}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Desa Yang Belum</h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Kecamatan</th>
							<th>Desa</th>
						</tr>
					</thead>
					<tbody>
						<?php $no =1; ?>
						@foreach($desa_belum as $db)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$db->Kecamatan->name}}</td>
							<td>{{$db->name}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>	
	</div>
	
<!-- </div> -->
@endsection
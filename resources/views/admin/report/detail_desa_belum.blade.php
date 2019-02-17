@extends('layouts.adminlte')

@section('content')
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Report</h3>
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
				@foreach($data_desa as $dt)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$dt->name}}</td>
					<td>{{$dt->total_formulir}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
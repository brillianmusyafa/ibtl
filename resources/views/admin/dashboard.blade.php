@extends('layouts.adminlte')

@section('content')
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Dashboard</h3>
	</div>
	<div class="panel-body">
		Selamat Datang di halaman Dashboard {{config('app.judul')}}
	</div>
</div>

<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>{{$dashboard['count_formulir']}}</h3>

				<p>Formulir Masuk</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="{{url('admin/formulir_btl')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>{{$dashboard['desa_belum']}}</h3>

				<p>Desa Belum</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="{{url('admin/report/desa')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>{{$dashboard['kelengkapan']}}</h3>

				<p>Lengkap</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>{{$dashboard['tidak_lengkap']}}</h3>

				<p>Berkas Belum Lengkap/Selesai</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Rekap Formulir</h3>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Category</th>
						<th>Count</th>
					</tr>
				</thead>
				<tbody>
					@foreach($dashboard['rekapByCat'] as $rekap)
					<tr>
						<td>{{($rekap->cat)?$rekap->cat->nama_category:''}}</td>
						<td>{{$rekap->count}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Chart</h3>
			</div>
			<div class="panel-body">
				<canvas id="myChart" height="100"></canvas>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<!-- ChartJS 1.0.1 -->

<!-- <script type="text/javascript" src="{{asset('bower_components/AdminLTE/plugins/chartjs/Chart.min.js')}}"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
<script type="text/javascript">
	// And for a doughnut chart
	// var ctx = document.getElementById("myChart").getContext('2d');
	// For a pie chart
	var randomScalingFactor = function() {
		return Math.round(Math.random() * 100);
	};
	function random_rgba() {
    // var o = Math.round, r = Math.random, s = 255;
    return '#'+(Math.random()*0xFFFFFF<<0).toString(16);
    // return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
}
	var config = {
		type: 'doughnut',
		data: {
			datasets: [{
				data: [
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				randomScalingFactor(),
				],
				backgroundColor: [random_rgba(),random_rgba(),random_rgba(),random_rgba(),random_rgba()
				],
				label: 'Dataset 1'
			}],
			labels: [
			'Red',
			'Orange',
			'Yellow',
			'Green',
			'Blue'
			]
		},
		options: {
			responsive: true,
			legend: {
				position: 'top',
			},
			title: {
				display: true,
				text: 'Chart.js Doughnut Chart'
			},
			animation: {
				animateScale: true,
				animateRotate: true
			}
		}
	};

	window.onload = function() {
			var ctx = document.getElementById('myChart').getContext('2d');
			window.myDoughnut = new Chart(ctx, config);
		};
</script>
@endpush
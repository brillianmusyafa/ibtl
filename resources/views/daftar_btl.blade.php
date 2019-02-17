@extends('layouts.halaman_muka')

@section('content')
<style type="text/css">
.title{
	border-bottom: 3px solid #27ae60;
}
.judul {
	font-weight: bold;
	font-family: serif;
	border-bottom: 4px solid #27ae60;
}

</style>

<h1 class="judul">{{$category->nama_category}}</h1>
<div style="overflow-x:auto;">
	<table class="table table-bordered table-hover" id="datatables">
		<thead>
			<tr>
				<th>#</th>
				<th>Kecamatan</th>
				<th>Desa</th>
				<th>Penerima</th>
				<th>Judul</th>
				<th>Berkas Masuk</th>
				<th>Nilai</th>
				<th>Pencairan</th>
				<th></th>
				<!-- <th>Keterangan</th> -->
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach($data as $d)
			<?php 
			$class = '';
			if($d->bendahara==1 && $d->spm==1 && $d->pengguna_anggaran==1){
				$class = 'success';
			}
			if($d->kelengkapan=='tidak lengkap'){
				$class = 'danger';
			}
			?>
			<tr class="{{$class}}">
				<td>{{$no++}}</td>
				<td>{{ $d->Kecamatan->name or '-'}}</td>
				<td>{{ $d->Desa->name or '-' }}</td>
				<td>{{ $d->penerima }}</td>
				<td>{{ $d->judul_berkas }}</td>
				<td>{{ $d->berkas_masuk_tgl }}</td>
				<td>Rp. {{ is_numeric($d->nilai)?number_format($d->nilai,0,'.','.'):$d->nilai}}</td>
				<td>{{ $d->pencairan_bulan}}</td>
				<td>
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>Bendahara</th>
								<th>SPM</th>
								<th>Pengguna Anggaran</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									{{$d->bendahara==1?'OK':''}}
									<p class="keterangan">{{$d->ket_bendahara}}</p>
								</td>
								<td>
									{{$d->spm==1?'OK':''}}
									<p class="keterangan">{{$d->ket_spm}}</p>
								</td>
								<td>
									{{$d->pengguna_anggaran==1?'OK':''}}
									<p class="keterangan">{{$d->ket_pengguna_anggaran}}</p>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
				<!-- <td>{{ $d->keterangan}}</td> -->
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
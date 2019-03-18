@extends('layouts.adminlte')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Formulir BTL</h3>
	</div>
	<div class="panel-body">
		<a href="{{ url('/admin/formulir_btl/create') }}" class="btn btn-primary btn-xs" title="Add New Formulir_btl"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
		<br>
        <legend>Search</legend>
        <form action="" method="GET" class="form-inline" role="form">
        
            <div class="form-group">
                <label class="sr-only" for="">label</label>
                {!! Form::select('kecamatan_id',$lists_kec,null,['class'=>'form-control']) !!}
            </div>
        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
		<!-- <p>Export data hanya menampilkan 500 row data yang ditampilkan di list table</p> -->

        <p>Import Data</p>
        
        <form action="{{url('import')}}" method="POST" class="form-inline" role="form" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group">
                <label class="sr-only" for="">Import</label>
                <input type="file" name="import_name" class="form-control" id="" placeholder="Input field">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
		<div class="table-responsive">
		<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Penerima</th>
                <th>Judul Berkas</th>
                <th>Berkas Masuk Tanggal</th>
                <th>Pencairan Bulan</th>
                <th>Nilai</th>
                <th>Bendahara</th>
                <th>ket_bendahara</th>
                <th>SPM</th>
                <th>ket_bendahara</th>
                <th>Pengguna Anggaran</th>
                <th>ket_bendahara</th>
                <th>Action</th>

            </tr>
        </thead>
    </table>
</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    var url = $(location).attr('href').split('?');
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.formulir') !!}?'+url[1],
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama_category', name: 'nama_category',orderable:false,searchable:false },
            { data: 'kecamatan', name: 'kecamatan',orderable:false,searchable:false },
            { data: 'desa', name: 'desa',orderable:false,searchable:false },
            { data: 'penerima', name: 'penerima' },
            { data: 'judul_berkas', name: 'judul_berkas' },
            { data: 'berkas_masuk_tgl', name: 'berkas_masuk_tgl' },
            { data: 'pencairan_bulan', name: 'pencairan_bulan' },
            { data: 'nilai', name: 'nilai' },
            { data: 'bendahara', name: 'bendahara' },
            { data: 'ket_bendahara', name: 'ket_bendahara' },
            { data: 'spm', name: 'desa_id' },
            { data: 'ket_spm', name: 'ket_spm' },
            { data: 'pengguna_anggaran', name: 'pengguna_anggaran' },
            { data: 'ket_pengguna_anggaran', name: 'ket_pengguna_anggaran' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        dom: 'Bfrtip',
        pageLength: 10,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
});
</script>
@endpush
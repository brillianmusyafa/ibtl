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
<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <!-- <th>Category</th> -->
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Judul Berkas</th>
                <th>Nilai</th>
                <th>Bendahara</th>
                <th>Ket Bendahara</th>
                <th>SPM</th>
                <th>Ket SPM</th>
                <th>Pengguna Anggaran</th>
                <th>Ket Pengguna Anggaran</th>

            </tr>
        </thead>
    </table>
</div>
@endsection


@push('scripts')
<script>
console.log('testing');
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.formulir_front') !!}'+'/'+{{$category->id}},
        columns: [
            { data: 'id', name: 'id' },
            { data: 'kecamatan', name: 'kecamatan',orderable:false,searchable:false },
            { data: 'desa', name: 'desa',orderable:false,searchable:false },
            { data: 'judul_berkas', name: 'judul_berkas' },
            { data: 'nilai', name: 'nilai',render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp ' ) },
            { data: 'bendahara', name: 'bendahara',  render: function ( data, type, row ) {
                if(data == '1'){
                    return 'OK';
                }
                else{
                    return '-';
                }
                }
            },
            { data: 'ket_bendahara', name: 'ket_bendahara' },
            { data: 'spm', name: 'desa_id',  render: function ( data, type, row ) {
                if(data == '1'){
                    return 'OK';
                }
                else{
                    return '-';
                }
                } },
            { data: 'ket_spm', name: 'ket_spm' },
            { data: 'pengguna_anggaran', name: 'pengguna_anggaran',  render: function ( data, type, row ) {
                if(data == '1'){
                    return 'OK';
                }
                else{
                    return '-';
                }
                } },
            { data: 'ket_pengguna_anggaran', name: 'ket_pengguna_anggaran' },
        ],
        dom: 'Bfrtip',
        // pageLength: 10,
        buttons: [
            // 'copyHtml5',
            'excelHtml5',
            // 'csvHtml5',
            'pdfHtml5'
        ]
    });
});
</script>
@endpush
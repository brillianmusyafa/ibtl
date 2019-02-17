@extends('layouts.adminlte')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Data Formulir {{ $formulir_btl->id }}</div>
    <div class="panel-body">

        <a href="{{ url('formulir_btl/' . $formulir_btl->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Formulir_btl"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['formulir_btl', $formulir_btl->id],
            'style' => 'display:inline'
            ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'title' => 'Delete Formulir_btl',
            'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
            {!! Form::close() !!}
            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>ID</th><td>{{ $formulir_btl->id }}</td>
                        </tr>
                        <tr>
                            <th> Kategori </th>
                            <td> {{ $formulir_btl->Category->nama_category or '-' }} </td>
                        </tr>
                        <tr>
                            <th> Kecamatan </th>
                            <td> {{ $formulir_btl->kecamatan_id }} </td>
                        </tr>
                        <tr>
                            <th> Desa </th>
                            <td> {{ $formulir_btl->desa_id }} </td>
                        </tr>
                        <tr>
                            <th> Judul Berkas </th>
                            <td> {{ $formulir_btl->judul_berkas }} </td>
                        </tr>
                        <tr>
                            <th> Penerima </th>
                            <td> {{ $formulir_btl->penerima }} </td>
                        </tr>
                        <tr>
                            <th> Judul Berkas </th>
                            <td> {{ $formulir_btl->judul_berkas }} </td>
                        </tr>
                        <tr>
                            <th> Berkas Masuk Tanggal </th>
                            <td> {{ $formulir_btl->berkas_masuk_tgl }} </td>
                        </tr>
                        <tr>
                            <th> Pencairan Bulan </th>
                            <td> {{ $formulir_btl->pencairan_bulan }} </td>
                        </tr>
                        <tr>
                            <th> Nilai (Rp) </th>
                            <td> {{ number_format($formulir_btl->nilai,0,'.','.') }} </td>
                        </tr>
                        <tr>
                            <th> Kelengkapan </th>
                            <td> {{ $formulir_btl->kelengkapan }} </td>
                        </tr>
                        <tr>
                            <th> Keterangan </th>
                            <td> {{ $formulir_btl->keterangan }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    @endsection
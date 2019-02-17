@extends('layouts.adminlte')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Data Formulir</div>
    <div class="panel-body">

        <a href="{{ url('/admin/formulir_btl/create') }}" class="btn btn-primary btn-xs" title="Add New Formulir_btl"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table table-borderless" id="datatables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th> Kecamatan </th><th> Desa </th><th> Judul Berkas </th>
                        <th>Bendahara</th>
                        <th>SPM</th>
                        <th>Pengguna Anggaran</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($formulir_btl as $item)
                    <?php 
                    $class = '';
                    if($item->bendahara==1 && $item->spm==1 && $item->pengguna_anggaran==1){
                        $class = 'success';
                    }
                    if($item->kelengkapan=='tidak lengkap'){
                        $class = 'danger';
                    }
                    ?>
                    <tr class="{{$class}}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->Category->nama_category or ''}}</td>
                        <td>{{ $item->Kecamatan->name or '-' }}</td><td>{{ $item->Desa->name or '-' }}</td><td>{{ $item->judul_berkas }}</td>
                        <td>{{($item->bendahara == 1)?'Lengkap':'-'}}
                            <p class="keterangan">{{$item->ket_bendahara}}</p>
                        </td>
                        <td>{{($item->spm == 1)?'Lengkap':'-'}}
                            <p class="keterangan">{{$item->ket_spm}}</p>
                        </td>
                        <td>{{($item->pengguna_anggaran == 1)?'Lengkap':'-'}}
                            <p class="keterangan">{{$item->ket_pengguna_anggaran}}</p>
                        </td>
                        <td>
                            <!-- <a href="{{ url('/admin/formulir_btl/' . $item->id) }}" class="btn btn-success btn-xs" title="View Formulir_btl"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a> -->
                            <a href="{{ url('/admin/formulir_btl/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Formulir_btl"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/admin/formulir_btl', $item->id],
                                'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Formulir_btl" />', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete Formulir_btl',
                                'onclick'=>'return confirm("Confirm delete?")'
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$formulir_btl->links()}}
        </div>
    </div>
    @endsection
@extends('layouts.adminlte')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Daftar Pertanyaan</div>
    <div class="panel-body">

        <!-- <a href="{{ url('/pertanyaan/create') }}" class="btn btn-primary btn-xs" title="Add New Pertanyaan"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a> -->
        <!-- <br/>
        <br/> -->
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Untuk:Bidang</th><th>Dari:SKPD</th><th> Buku Tamu </th><th> Pertanyaan </th><th> Jawaban </th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pertanyaan as $item)
                    <tr class="{{($item->jawaban)?'':'danger'}}">
                    <td>{{$item->Buku_tamu->Bidang->nama_bidang}}</td>
                        <td>{{$item->Buku_tamu->SKPD->nama_skpd}}</td>
                        <td>{{ $item->Buku_tamu->nama }}</td><td>{{ $item->pertanyaan }}</td>
                        <td>{{ $item->jawaban }}</td>
                        <td>
                            <a href="{{ url('admin/pertanyaan/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Pertanyaan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/> Jawab</a>
                            {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/pertanyaan', $item->id],
                            'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Pertanyaan" /> Hapus', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Pertanyaan',
                            'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $pertanyaan->render() !!} </div>
        </div>

    </div>
</div>

@endsection
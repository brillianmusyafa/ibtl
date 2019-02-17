@extends('layouts.adminlte')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Data Bidang</div>
    <div class="panel-body">

        <a href="{{ url('/admin/kategory/create') }}" class="btn btn-primary btn-xs" title="Add New Kategory"><span class="glyphicon glyphicon-plus" aria-hidden="true"/>Tambah</a>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                    <th>ID</th><th> Nama Bidang </th><th> Informasi </th><th>CP</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategory as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_kategori }}</td><td>{{ $item->nama_group }}</td><td>{{$item->cp}}</td>
                        <td>
                            <!-- <a href="{{ url('/admin/kategory/' . $item->id) }}" class="btn btn-success btn-xs" title="View Kategory"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a> -->
                            <a href="{{ url('/admin/kategory/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Kategory"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/> Edit</a>
                            {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/kategory', $item->id],
                            'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Kategory" /> Hapus', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Kategory',
                            'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $kategory->render() !!} </div>
        </div>

    </div>
</div>

@endsection
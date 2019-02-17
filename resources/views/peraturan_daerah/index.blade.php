@extends('layouts.adminlte')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Data</div>
    <div class="panel-body">

    <a href="{{ url('/admin/peraturan_daerah/create') }}" class="btn btn-primary btn-xs" title="Add New peraturan_daerah"><span class="glyphicon glyphicon-plus" aria-hidden="true"/> Tambah</a>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>NO</th><th> Name </th><th> File </th><th> Tahun </th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($peraturan_daerah as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->name }}</td><td><a href="/upload/{{ $item->file }}">{{ $item->file }}</a> </td><td>{{ $item->tahun }}</td>
                        <td>
                            <!-- <a href="{{ url('/admin/peraturan_daerah/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit peraturan_daerah"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a> -->
                            {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/peraturan_daerah', $item->id],
                            'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete peraturan_daerah" />', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete peraturan_daerah',
                            'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $peraturan_daerah->render() !!} </div>
        </div>

    </div>
</div>

@endsection
@extends('layouts.adminlte')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Apbd</div>
    <div class="panel-body">

    <a href="{{ url('/admin/apbd/create') }}" class="btn btn-primary btn-xs" title="Add New Apbd"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>NO</th><th> Nama </th><th> Tahun </th><th> File </th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($apbd as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$item->type}}</td>
                        <td>{{ $item->nama }}</td><td>{{ $item->tahun }}</td><td><a href="/upload/{{ $item->file }}">{{$item->file}}</a> </td>
                        <td>
                            <!-- <a href="{{ url('/admin/apbd/' . $item->id) }}" class="btn btn-success btn-xs" title="View Apbd"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                            <a href="{{ url('/admin/apbd/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Apbd"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a> -->
                            {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/apbd', $item->id],
                            'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Apbd" />', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Apbd',
                            'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $apbd->render() !!} </div>
        </div>

    </div>
</div>

@endsection
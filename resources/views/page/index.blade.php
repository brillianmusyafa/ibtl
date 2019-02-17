@extends('layouts.adminlte')

@section('content')
<div class="panel panel-default">
<div class="panel-heading">Halaman</div>
    <div class="panel-body">

        <a href="{{ url('/page/create') }}" class="btn btn-primary btn-xs" title="Add New Page"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>ID</th><th> Title </th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($page as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <a href="{{ url('/page/' . $item->id) }}" class="btn btn-success btn-xs" title="View Page"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                            <a href="{{ url('/page/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Page"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                            {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/page', $item->id],
                            'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Page" />', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Page',
                            'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $page->render() !!} </div>
        </div>

    </div>
</div>

@endsection
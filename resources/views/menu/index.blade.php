@extends('layouts.adminlte')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Menu</div>
    <div class="panel-body">

        <a href="{{ url('/admin/menu/create') }}" class="btn btn-primary btn-xs" title="Add New Menu"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>ID</th><th> Nama Menu </th><th> Link </th><th> Icon </th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menu as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_menu }}</td><td>{{ $item->link }}</td><td>{{ $item->icon }}</td>
                        <td>
                            <a href="{{ url('/admin/menu/' . $item->id) }}" class="btn btn-success btn-xs" title="View Menu"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                            <a href="{{ url('/admin/menu/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Menu"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/admin/menu', $item->id],
                                'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Menu" />', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete Menu',
                                'onclick'=>'return confirm("Confirm delete?")'
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $menu->render() !!} </div>
            </div>

        </div>
    </div>
    @endsection
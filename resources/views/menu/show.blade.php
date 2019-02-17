@extends('layouts.adminlte')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Menu {{ $menu->id }}</div>
    <div class="panel-body">

        <a href="{{ url('menu/' . $menu->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Menu"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/menu', $menu->id],
            'style' => 'display:inline'
            ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'title' => 'Delete Menu',
            'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
            {!! Form::close() !!}
            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>ID</th><td>{{ $menu->id }}</td>
                        </tr>
                        <tr><th> Nama Menu </th><td> {{ $menu->nama_menu }} </td></tr><tr><th> Link </th><td> {{ $menu->link }} </td></tr><tr><th> Icon </th><td> {{ $menu->icon }} </td></tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    @endsection
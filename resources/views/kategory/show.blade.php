@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Kategory {{ $kategory->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('kategory/' . $kategory->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Kategory"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['kategory', $kategory->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Kategory',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $kategory->id }}</td>
                                    </tr>
                                    <tr><th> Nama Kategori </th><td> {{ $kategory->nama_kategori }} </td></tr><tr><th> Is Group </th><td> {{ $kategory->is_group }} </td></tr><tr><th> Nama Group </th><td> {{ $kategory->nama_group }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
@endsection
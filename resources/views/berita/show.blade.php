@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Beritum {{ $beritum->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('berita/' . $beritum->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Beritum"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['berita', $beritum->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Beritum',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $beritum->id }}</td>
                                    </tr>
                                    <tr><th> Judul </th><td> {{ $beritum->judul }} </td></tr><tr><th> Ringkasan </th><td> {{ $beritum->ringkasan }} </td></tr><tr><th> Body </th><td> {{ $beritum->body }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
@endsection
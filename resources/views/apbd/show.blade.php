@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Apbd {{ $apbd->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('apbd/' . $apbd->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Apbd"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['apbd', $apbd->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Apbd',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $apbd->id }}</td>
                                    </tr>
                                    <tr><th> Nama </th><td> {{ $apbd->nama }} </td></tr><tr><th> Tahun </th><td> {{ $apbd->tahun }} </td></tr><tr><th> File </th><td> {{ $apbd->file }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
@endsection
@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">peraturan_daerah {{ $peraturan_daerah->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('peraturan_daerah/' . $peraturan_daerah->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit peraturan_daerah"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['peraturan_daerah', $peraturan_daerah->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete peraturan_daerah',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $peraturan_daerah->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $peraturan_daerah->name }} </td></tr><tr><th> File </th><td> {{ $peraturan_daerah->file }} </td></tr><tr><th> Tahun </th><td> {{ $peraturan_daerah->tahun }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
@endsection
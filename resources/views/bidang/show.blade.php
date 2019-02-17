@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Bidang {{ $bidang->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('bidang/' . $bidang->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Bidang"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['bidang', $bidang->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Bidang',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $bidang->id }}</td>
                                    </tr>
                                    <tr><th> Nama Bidang </th><td> {{ $bidang->nama_bidang }} </td></tr><tr><th> Keterangan </th><td> {{ $bidang->keterangan }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
@endsection
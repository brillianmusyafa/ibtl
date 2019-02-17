@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Buku_tamu {{ $buku_tamu->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('buku_tamu/' . $buku_tamu->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Buku_tamu"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['buku_tamu', $buku_tamu->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Buku_tamu',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $buku_tamu->id }}</td>
                                    </tr>
                                    <tr><th> Nama </th><td> {{ $buku_tamu->nama }} </td></tr><tr><th> Nip </th><td> {{ $buku_tamu->nip }} </td></tr><tr><th> Skpd </th><td> {{ $buku_tamu->skpd }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
@endsection
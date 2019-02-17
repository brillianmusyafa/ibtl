@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Pertanyaan {{ $pertanyaan->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('pertanyaan/' . $pertanyaan->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Pertanyaan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['pertanyaan', $pertanyaan->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Pertanyaan',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $pertanyaan->id }}</td>
                                    </tr>
                                    <tr><th> Buku Tamu Id </th><td> {{ $pertanyaan->buku_tamu_id }} </td></tr><tr><th> Pertanyaan </th><td> {{ $pertanyaan->pertanyaan }} </td></tr><tr><th> Jawaban </th><td> {{ $pertanyaan->jawaban }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
@endsection
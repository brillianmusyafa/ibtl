@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Buku_tamu</div>
                    <div class="panel-body">

                        <a href="{{ url('/buku_tamu/create') }}" class="btn btn-primary btn-xs" title="Add New Buku_tamu"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Nama </th><th> Nip </th><th> Skpd </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($buku_tamu as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama }}</td><td>{{ $item->nip }}</td><td>{{ $item->skpd }}</td>
                                        <td>
                                            <a href="{{ url('/buku_tamu/' . $item->id) }}" class="btn btn-success btn-xs" title="View Buku_tamu"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/buku_tamu/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Buku_tamu"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/buku_tamu', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Buku_tamu" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Buku_tamu',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $buku_tamu->render() !!} </div>
                        </div>

                    </div>
                </div>

@endsection
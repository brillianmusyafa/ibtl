@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Berita</div>
                    <div class="panel-body">

                        <a href="{{ url('/berita/create') }}" class="btn btn-primary btn-xs" title="Add New Beritum"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Judul </th><th> Ringkasan </th><th> Body </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($berita as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->judul }}</td><td>{{ $item->ringkasan }}</td><td>{{ $item->body }}</td>
                                        <td>
                                            <a href="{{ url('/berita/' . $item->id) }}" class="btn btn-success btn-xs" title="View Beritum"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/berita/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Beritum"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/berita', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Beritum" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Beritum',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $berita->render() !!} </div>
                        </div>

                    </div>
                </div>

@endsection
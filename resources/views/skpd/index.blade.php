@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Skpd</div>
                    <div class="panel-body">

                        <a href="{{ url('/skpd/create') }}" class="btn btn-primary btn-xs" title="Add New Skpd"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Nama Skpd </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($skpd as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama_skpd }}</td>
                                        <td>
                                            <a href="{{ url('/skpd/' . $item->id) }}" class="btn btn-success btn-xs" title="View Skpd"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/skpd/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Skpd"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/skpd', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Skpd" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Skpd',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $skpd->render() !!} </div>
                        </div>

                    </div>
                </div>

@endsection
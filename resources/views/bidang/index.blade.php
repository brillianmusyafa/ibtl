@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Bidang</div>
                    <div class="panel-body">

                        <a href="{{ url('/bidang/create') }}" class="btn btn-primary btn-xs" title="Add New Bidang"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Nama Bidang </th><th> Keterangan </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($bidang as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama_bidang }}</td><td>{{ $item->keterangan }}</td>
                                        <td>
                                            <a href="{{ url('/bidang/' . $item->id) }}" class="btn btn-success btn-xs" title="View Bidang"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/bidang/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Bidang"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/bidang', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Bidang" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Bidang',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $bidang->render() !!} </div>
                        </div>

                    </div>
                </div>

@endsection
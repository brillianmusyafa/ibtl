@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Buat Peraturan Daerah</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/peraturan_daerah', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('peraturan_daerah.form')

                        {!! Form::close() !!}

                    </div>
                </div>
@endsection
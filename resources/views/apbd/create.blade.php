@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Buat APBD</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/apbd', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('apbd.form')

                        {!! Form::close() !!}

                    </div>
                </div>
@endsection
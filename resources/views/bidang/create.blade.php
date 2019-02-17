@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Bidang</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/bidang', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('bidang.form')

                        {!! Form::close() !!}

                    </div>
                </div>
@endsection
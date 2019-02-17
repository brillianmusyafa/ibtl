@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Bidang {{ $bidang->id }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($bidang, [
                            'method' => 'PATCH',
                            'url' => ['/bidang', $bidang->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('bidang.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
@endsection
@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Apbd {{ $apbd->id }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($apbd, [
                            'method' => 'PATCH',
                            'url' => ['/apbd', $apbd->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('apbd.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
@endsection
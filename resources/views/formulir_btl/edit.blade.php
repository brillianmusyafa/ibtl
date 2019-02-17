@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Formulir_btl {{ $formulir_btl->id }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($formulir_btl, [
                            'method' => 'PATCH',
                            'url' => ['/admin/formulir_btl', $formulir_btl->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('formulir_btl.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
@endsection
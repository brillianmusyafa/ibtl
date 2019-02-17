@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Buku_tamu {{ $buku_tamu->id }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($buku_tamu, [
                            'method' => 'PATCH',
                            'url' => ['/buku_tamu', $buku_tamu->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('buku_tamu.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
@endsection
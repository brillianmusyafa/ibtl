@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Skpd {{ $skpd->id }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($skpd, [
                            'method' => 'PATCH',
                            'url' => ['/skpd', $skpd->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('skpd.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
@endsection
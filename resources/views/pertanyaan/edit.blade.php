@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Pertanyaan {{ $pertanyaan->id }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($pertanyaan, [
                            'method' => 'PATCH',
                            'url' => ['admin/pertanyaan', $pertanyaan->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('pertanyaan.form', ['submitButtonText' => 'Jawab'])

                        {!! Form::close() !!}

                    </div>
                </div>
@endsection
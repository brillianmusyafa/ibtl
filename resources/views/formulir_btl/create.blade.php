@extends('layouts.adminlte')

@section('content')
<div class="panel panel-success">
    <div class="panel-heading">Buat Formulir BTL Baru</div>
    <div class="panel-body">

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        {!! Form::open(['url' => '/admin/formulir_btl', 'class' => 'form-horizontal', 'files' => true]) !!}

        @include ('formulir_btl.form')

        {!! Form::close() !!}

    </div>
</div>
@endsection
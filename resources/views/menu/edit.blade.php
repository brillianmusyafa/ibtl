@extends('layouts.adminlte')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Edit Menu {{ $menu->id }}</div>
    <div class="panel-body">

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        {!! Form::model($menu, [
            'method' => 'PATCH',
            'url' => ['/admin/menu', $menu->id],
            'class' => 'form-horizontal',
            'files' => true
            ]) !!}

            @include ('menu.form', ['submitButtonText' => 'Update'])

            {!! Form::close() !!}

        </div>
    </div>
    @endsection
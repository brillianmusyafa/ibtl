@extends('layouts.adminlte')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Edit Role {{ $role->id }}</div>
    <div class="panel-body">

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        {!! Form::model($role, [
        'method' => 'PATCH',
        'url' => ['/admin/role', $role->id],
        'class' => 'form-horizontal',
        'files' => true
        ]) !!}

        @include ('admin.role.form', ['submitButtonText' => 'Update'])

        {!! Form::close() !!}

    </div>
</div>
@endsection
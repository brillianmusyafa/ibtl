@extends('layouts.adminlte')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Edit peraturan_daerah {{ $peraturan_daerah->id }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($peraturan_daerah, [
                            'method' => 'PATCH',
                            'url' => ['/peraturan_daerah', $peraturan_daerah->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('peraturan_daerah.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
@endsection
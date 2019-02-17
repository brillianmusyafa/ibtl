@extends('layouts.adminlte')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Create New User</div>
    <div class="panel-body">

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        {!! Form::open(['url' => '/admin/users', 'class' => 'form-horizontal', 'files' => true]) !!}

        @include ('users.form')

        {!! Form::close() !!}

    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $('#role_id').on('change',function(elem){
        console.log(elem);

        if(this.value == 2){
            $('#block-bidang').removeClass('hidden');
            $('#block-bidang').show('slow');
        }
        else{
            $('#block-bidang').addClass('hidden');
            $('#block-bidang').hide('slow');
        }
    });

</script>
@endsection
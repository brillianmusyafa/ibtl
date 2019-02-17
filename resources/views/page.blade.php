@extends('layouts.halaman_muka')

@section('content')
<h1 class="title">{{$data->title}}</h1>
{!! $data->body !!}
@endsection
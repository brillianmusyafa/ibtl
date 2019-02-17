@extends('layouts.halaman_muka')

@section('content')
<div class="row">
	<h1 class="title">{{$home->title}}</h1>
{!!$home->body!!}
</div>
@endsection
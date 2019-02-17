@extends('layouts.halaman_muka')

@section('content')
<h2>APBD</h2>
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">PERDA</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tahun</th>
            <th>No Tanggal</th>
            <th>Download</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        @foreach($perda as $item)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->tahun}}</td>
            <td>{{$item->no_tanggal}}</td>
            <td><a class="btn btn-xs btn-primary" href="/upload/{{$item->file}}" role="button">Download</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
</div>

<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">PERBUP</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tahun</th>
            <th>No Tanggal</th>
            <th>Download</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        @foreach($perbub as $item)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->tahun}}</td>
            <td>{{$item->no_tanggal}}</td>
            <td><a class="btn btn-xs btn-primary" href="/upload/{{$item->file}}" role="button">Download</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
</div>
@endsection
@extends('layouts.halaman_muka')

@section('content')
<h3>PERPUSTAKAAN KEUANGAN DAERAH</h3>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal terbit</th>
            <th>Download</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        @foreach($data as $item)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->tahun}}</td>
            <td><a class="btn btn-xs btn-primary" href="/upload/{{$item->file}}" role="button">Download</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
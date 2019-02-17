@extends('layouts.halaman_muka')

@section('content')
<div class="panel panel-info">
    <div class="panel-heading">Pertanyaan</div>
    <div class="panel-body">
        <form action="" method="POST" class="form-inline" role="form">

            <div class="form-group">
                <label class="sr-only" for="">label</label>
                {!! Form::text('key',null,['class'=>'form-control','placeholder'=>'Masukkan Kata Kunci']) !!}
            </div>



            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>No</th><th>Bidang</th><th>SKPD</th><th> Nama </th><th> Pertanyaan </th><th> Jawaban </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($pertanyaan as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->Buku_tamu->bidang_id }}</td>
                        <td>{{ $item->Buku_tamu->SKPD->nama_skpd}}</td>
                        <td>{{ $item->Buku_tamu->nama }}</td>
                        <td>{{ $item->pertanyaan }}
                            @if($item->lampiran)
                            <br>
                            Lampiran : <i>(terlampir)</i>
                            @endif
                        </td>
                        <td>{{ $item->jawaban }}

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
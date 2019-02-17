@extends('layouts.halaman_muka')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Anda akan bertanya di APBD Service Center seputar <strong>{{$nama_kategori}}</strong>
        </div>
        {!! Form::open(['url'=>'buku_tamu']) !!}
            <legend>Buku Tamu</legend>
            {!! Form::hidden('bidang_id',$bidang) !!}
            <div class="form-group">
                <label for="">SKPD*</label>
                {!! Form::select('skpd',$list_skpd,null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="">Nama*</label>
                {!! Form::text('nama',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="">NIP*</label>
                {!! Form::text('nip',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="">Alamat*</label>
                {!! Form::textarea('alamat',null,['class'=>'form-control','rows'=>'3']) !!}
            </div>
            <div class="form-group">
                <label for="">Nomor Telp (yang bisa dihubungi)*</label>
                {!! Form::text('no_telp',null,['class'=>'form-control']) !!}
            </div>
            <button type="submit" class="btn btn-primary">Lanjut</button>
        {!! Form::close() !!}
    </div>
    <div class="col-md-6">
        <div class="well">
            <h3>Tata Cara pengisian buku tamu:</h3>
            <hr>
            <ol>
                <li>Isi SKPD, Nama, NIP, Alamat, Nomor Telp</li>
                <li>Klik tombol Submit</li>
                <li>*) Data wajib diisi</li>
                <li>Untuk format lampiran adalah foto atau doc</li>
            </ol>
        </div>
    </div>
</div>
@endsection
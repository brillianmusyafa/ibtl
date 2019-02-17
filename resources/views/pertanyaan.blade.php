@extends('layouts.halaman_muka')

@section('content')
<div class="row">
    <div class="col-md-6">
        <legend>Data Diri</legend>
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td>SKPD</td>
                    <td>{{$buku_tamu->SKPD->nama_skpd}}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{$buku_tamu->nama}}, NIP : {{$buku_tamu->nip}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{$buku_tamu->alamat}}</td>
                </tr>
                <tr>
                    <td width="100px">No Telp</td>
                    <td>{{$buku_tamu->no_telp}}</td>
                </tr>
            </tbody>
        </table>
        @if($buku_tamu->sudah_tanya == 0)
        <h3>Untuk {{$buku_tamu->Bidang->nama_bidang}}</h3>
         {!! Form::open(['url' => 'admin/pertanyaan', 'files' => true]) !!}
            <legend>Formulir Pertanyaan</legend>
            {!! Form::hidden('buku_tamu_id',$buku_tamu->id); !!}
            <div class="form-group">
                <label for="">Pertanyaan*</label>
                {!! Form::textarea('pertanyaan',null,['class'=>'form-control','rows'=>'5']) !!}
            </div>
            <div class="form-group">
                <label for="">Lampiran</label>
                {!! Form::file('lampiran',null,['class'=>'form-control']) !!}
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pertanyaan</button>
            <!-- <a class="btn btn-primary" data-toggle="modal" href='#kirim'>Kirim Pertanyaan</a>
            <div class="modal fade" id="kirim">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Pertanyaan Terkirim</h4>
                        </div>
                        <div class="modal-body">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>Terima Kasih! </strong>Pertanyaan Anda akan segera kami proses.
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div> -->
        </form>
        @else
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Terima kasih sudah bertanya, pertanyaan Anda akan kami respon secepatnya
        </div>
        @endif
    </div>
    <div class="col-md-6">
        <div class="well">
            <legend>Tata Cara Bertanya di Klinik Keuangan Daerah:</legend>

            <ol>
                <li>Tuliskan pertanyaan yang akan diajukan</li>
                <li>Jika ada lampiran silahkan upload lampiran Anda</li>
                <li>Untuk format lampiran adalah foto atau doc</li>
                <li>*) Data wajib diisi</li>
                <li>Klik Kirim Pertanyaan</li>
                <li>Setelah pertanyaan terkirim, kami akan segera memproses pertanyaan Anda</li>
                <li>Pertanyaan Anda akan kami umumkan di menu Daftar Pertanyaan</li>
                <li>Terima kasih atas pertanyaan Anda</li>
            </ol>
        </div>
    </div>
</div>
@endsection
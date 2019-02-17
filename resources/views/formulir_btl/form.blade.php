<div class="form-group {{ $errors->has('kecamatan_id') ? 'has-error' : ''}}">
    {!! Form::label('category_id', 'Kategori', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('category',$category, $value_category, ['class' => 'form-control','id'=>'category_id','placeholder'=>'-Pilih kategori','required'=>'required']) !!}
        {!! $errors->first('kecamatan_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('kecamatan_id') ? 'has-error' : ''}}">
    {!! Form::label('category_id', 'Sub Kategori', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('category',$category, null, ['class' => 'form-control','id'=>'sub','placeholder'=>'-Pilih Subkategori']) !!}
        {!! $errors->first('kecamatan_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('kecamatan_id') ? 'has-error' : ''}}">
    {!! Form::label('kecamatan_id', 'Kecamatan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('kecamatan_id',$kecamatan, null, ['class' => 'form-control','placeholder'=>'-Pilih Kecamatan','id'=>'kecamatan_id']) !!}
        {!! $errors->first('kecamatan_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('desa_id') ? 'has-error' : ''}}">
    {!! Form::label('desa_id', 'Desa', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('desa_id',[], null, ['class' => 'form-control','id'=>'desa_id','placeholder'=>'-Pilih Desa']) !!}
        {!! $errors->first('desa_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('judul_berkas') ? 'has-error' : ''}}">
    {!! Form::label('penerima', 'Penerima', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('penerima', null, ['class' => 'form-control']) !!}
        {!! $errors->first('penerima', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<legend>Data Pemberkasan</legend>

<div class="form-group {{ $errors->has('judul_berkas') ? 'has-error' : ''}}">
    {!! Form::label('judul_berkas', 'Judul Berkas', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('judul_berkas', null, ['class' => 'form-control']) !!}
        {!! $errors->first('judul_berkas', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('berkas_masuk_tgl') ? 'has-error' : ''}}">
    {!! Form::label('berkas_masuk_tgl', 'Berkas Masuk Tgl', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('berkas_masuk_tgl', null, ['class' => 'form-control']) !!}
        {!! $errors->first('berkas_masuk_tgl', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pencarian_bulan') ? 'has-error' : ''}}">
    {!! Form::label('pencarian_bulan', 'Pencairan Bulan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pencairan_bulan', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pencarian_bulan', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('nilai') ? 'has-error' : ''}}">
    {!! Form::label('nilai', 'Nilai', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nilai', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nilai', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('kelengkapan') ? 'has-error' : ''}}">
    {!! Form::label('tahapan', 'Tahapan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('tahapan',$tahapan, null, ['class' => 'form-control']) !!}
        {!! $errors->first('tahapan', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<legend>Verifikasi Bendahara</legend>
<div class="form-group {{ $errors->has('kelengkapan') ? 'has-error' : ''}}">
    {!! Form::label('bendahara', 'bendahara', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
       <div class="checkbox">
        <label>
            <input type="checkbox" name="bendahara" value="1" {{isset($formulir_btl->bendahara)?'checked':''}}>
        </label>
    </div>
    {!! $errors->first('bendahara', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('kelengkapan') ? 'has-error' : ''}}">
    {!! Form::label('ket_bendahara', 'Keterangan Bendahara', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('ket_bendahara', null, ['class' => 'form-control','rows'=>'2']) !!}
        {!! $errors->first('ket_bendahara', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<legend>Verifikasi SPM</legend>
<div class="form-group {{ $errors->has('kelengkapan') ? 'has-error' : ''}}">
    {!! Form::label('spm', 'SPM ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
       <div class="checkbox">
        <label>
            <input type="checkbox" name="spm" value="1" {{isset($formulir_btl->spm)?'checked':''}}>
        </label>
    </div>
    {!! $errors->first('spm', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('kelengkapan') ? 'has-error' : ''}}">
    {!! Form::label('ket_spm', 'Keterangan SPM', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('ket_spm', null, ['class' => 'form-control','rows'=>'2']) !!}
        {!! $errors->first('ket_spm', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<legend>Pengguna Anggaran</legend>
<div class="form-group {{ $errors->has('kelengkapan') ? 'has-error' : ''}}">
    {!! Form::label('pengguna_anggaran', 'Pengguna Anggaran', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="pengguna_anggaran" value="1" {{isset($formulir_btl->pengguna_anggaran)?'checked':''}}>
            </label>
        </div>
        {!! $errors->first('pengguna_anggaran', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('kelengkapan') ? 'has-error' : ''}}">
    {!! Form::label('ket_pengguna_anggaran', 'Keterangan Pengguna Anggaran', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('ket_pengguna_anggaran', null, ['class' => 'form-control','rows'=>'2']) !!}
        {!! $errors->first('ket_pengguna_anggaran', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('kelengkapan') ? 'has-error' : ''}}">
    {!! Form::label('kelengkapan', 'Kelengkapan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('kelengkapan',['lengkap'=>'Lengkap','tidak lengkap'=>'Tidak Lengkap'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('kelengkapan', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">
    {!! Form::label('keterangan', 'Keterangan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('keterangan', null, ['class' => 'form-control','rows'=>'2']) !!}
        {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    $('#kecamatan_id').on('change',function(){
        $.get('{{url("api/get-desa/")}}/'+this.value,function(data){
            $('#desa_id').html(data);
        });
    });

    $('#category_id').on('change',function(){
        $.get('{{url("api/sub-category")}}/'+this.value,function(data){
            $('#sub').html(data);
        });
    });


    if({{$value_sub_category}}!==0){
        console.log('ada sub category');
        $.get('{{url("api/sub-category")}}/'+{{$value_category}},function(data){
            $('#sub').html(data);
            $('#sub').val({{$value_sub_category}});
        });
    }


    if({{$desa}} !==0){
        $.get('{{url("api/get-desa/")}}/'+{{$value_kecamatan}},function(data){
            $('#desa_id').html(data);
            $('#desa_id').val({{$desa}});
        });
    }
</script>
@endpush
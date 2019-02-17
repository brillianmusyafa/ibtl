<div class="form-group {{ $errors->has('buku_tamu_id') ? 'has-error' : ''}}">
    {!! Form::label('buku_tamu_id', 'Nama di Buku Tamu', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('buku_tamu_id', null, ['class' => 'form-control']) !!}
        {!! Form::text('buku_tamu_nama', $pertanyaan->Buku_tamu->nama, ['class' => 'form-control','disabled'=>'disabled']) !!}
        {!! $errors->first('buku_tamu_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pertanyaan') ? 'has-error' : ''}}">
    {!! Form::label('pertanyaan', 'Pertanyaan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('pertanyaan', null, ['class' => 'form-control','rows'=>'3','disabled'=>'disabled']) !!}
        {!! $errors->first('pertanyaan', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('jawaban') ? 'has-error' : ''}}">
    {!! Form::label('jawaban', 'Jawaban', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('jawaban', null, ['class' => 'form-control','rows'=>'3']) !!}
        {!! $errors->first('jawaban', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'admin', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
        {!! Form::text('user_id', Auth::user()->name, ['class' => 'form-control','disabled'=>'disabled']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

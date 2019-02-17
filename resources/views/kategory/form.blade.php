<div class="form-group {{ $errors->has('nama_kategori') ? 'has-error' : ''}}">
    {!! Form::label('nama_kategori', 'Nama Bidang*', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama_kategori', null, ['class' => 'form-control','required'=>'required']) !!}
        {!! $errors->first('nama_kategori', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<!-- <div class="form-group {{ $errors->has('is_group') ? 'has-error' : ''}}">
    {!! Form::label('is_group', 'Is Group', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('is_group', null, ['class' => 'form-control']) !!}
        {!! $errors->first('is_group', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->
<div class="form-group {{ $errors->has('nama_group') ? 'has-error' : ''}}">
    {!! Form::label('nama_group', 'Informasi*', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama_group', null, ['class' => 'form-control','required'=>'required']) !!}
        {!! $errors->first('nama_group', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('nama_group') ? 'has-error' : ''}}">
    {!! Form::label('cp', 'Contact Person*', ['class' => 'col-md-4 control-label','required'=>'required']) !!}
    <div class="col-md-6">
        {!! Form::text('cp', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama_group', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
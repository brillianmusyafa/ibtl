<div class="form-group {{ $errors->has('nama_menu') ? 'has-error' : ''}}">
    {!! Form::label('nama_menu', 'Nama Menu', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama_menu', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama_menu', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    {!! Form::label('link', 'Link', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('link', null, ['class' => 'form-control']) !!}
        {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
    {!! Form::label('icon', 'Icon', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('icon', null, ['class' => 'form-control']) !!}
        {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('sequence') ? 'has-error' : ''}}">
    {!! Form::label('sequence', 'Sequence', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('sequence', null, ['class' => 'form-control']) !!}
        {!! $errors->first('sequence', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('is_parent') ? 'has-error' : ''}}">
    {!! Form::label('is_parent', 'Is Parent', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('is_parent', null, ['class' => 'form-control']) !!}
        {!! $errors->first('is_parent', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('menu_id') ? 'has-error' : ''}}">
    {!! Form::label('menu_id', 'Menu Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('menu_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('menu_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
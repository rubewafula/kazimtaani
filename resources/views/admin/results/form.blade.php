<div class="form-group{{ $errors->has('reg_no') ? 'has-error' : ''}}">
    {!! Form::label('reg_no', 'Reg No', ['class' => 'control-label']) !!}
    {!! Form::text('reg_no', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('reg_no', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('course') ? 'has-error' : ''}}">
    {!! Form::label('course', 'Course', ['class' => 'control-label']) !!}
    {!! Form::text('course', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('course', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('section') ? 'has-error' : ''}}">
    {!! Form::label('section', 'Section', ['class' => 'control-label']) !!}
    {!! Form::text('section', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('section', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('sitting') ? 'has-error' : ''}}">
    {!! Form::label('sitting', 'Sitting', ['class' => 'control-label']) !!}
    {!! Form::text('sitting', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('sitting', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('year') ? 'has-error' : ''}}">
    {!! Form::label('year', 'Year', ['class' => 'control-label']) !!}
    {!! Form::text('year', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('score') ? 'has-error' : ''}}">
    {!! Form::label('score', 'Score', ['class' => 'control-label']) !!}
    {!! Form::text('score', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('score', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>

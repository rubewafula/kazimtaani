<div class="form-group{{ $errors->has('msisdn') ? 'has-error' : ''}}">
    {!! Form::label('msisdn', 'Msisdn', ['class' => 'control-label']) !!}
    {!! Form::text('msisdn', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('msisdn', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('message') ? 'has-error' : ''}}">
    {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
    {!! Form::textarea('message', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('status_id') ? 'has-error' : ''}}">
    {!! Form::label('status_id', 'Status Id', ['class' => 'control-label']) !!}
    {!! Form::number('status_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('date_sent') ? 'has-error' : ''}}">
    {!! Form::label('date_sent', 'Date Sent', ['class' => 'control-label']) !!}
    {!! Form::input('datetime-local', 'date_sent', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('date_sent', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>

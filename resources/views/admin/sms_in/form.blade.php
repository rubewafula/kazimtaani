<div class="form-group{{ $errors->has('msisdn') ? 'has-error' : ''}}">
    {!! Form::label('msisdn', 'Msisdn', ['class' => 'control-label']) !!}
    {!! Form::text('msisdn', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('msisdn', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('reference') ? 'has-error' : ''}}">
    {!! Form::label('reference', 'Reference', ['class' => 'control-label']) !!}
    {!! Form::text('reference', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('reference', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('short_code') ? 'has-error' : ''}}">
    {!! Form::label('short_code', 'Short Code', ['class' => 'control-label']) !!}
    {!! Form::text('short_code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('short_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('date_received') ? 'has-error' : ''}}">
    {!! Form::label('date_received', 'Date Received', ['class' => 'control-label']) !!}
    {!! Form::text('date_received', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('date_received', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('campaign_id') ? 'has-error' : ''}}">
    {!! Form::label('campaign_id', 'Campaign Id', ['class' => 'control-label']) !!}
    {!! Form::text('campaign_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('campaign_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('message') ? 'has-error' : ''}}">
    {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
    {!! Form::text('message', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('status_id') ? 'has-error' : ''}}">
    {!! Form::label('status_id', 'Status Id', ['class' => 'control-label']) !!}
    {!! Form::text('status_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>

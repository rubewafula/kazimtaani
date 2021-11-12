<div class="form-group{{ $errors->has('msisdn') ? 'has-error' : ''}}">
    {!! Form::label('msisdn', 'Msisdn', ['class' => 'control-label']) !!}
    {!! Form::text('msisdn', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('msisdn', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('sms_group_id') ? 'has-error' : ''}}">
    {!! Form::label('sms_group_id', 'Sms Group', ['class' => 'control-label']) !!}

    <?php  $sms_groups= App\Models\Sms_group::pluck('name','id')->prepend('Select','')?>
    {!! Form::select('sms_group_id',$sms_groups, null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('sms_group_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>

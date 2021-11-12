

<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('sms_group_id') ? 'has-error' : ''}}">
    {!! Form::label('sms_group_id', 'Sms Group', ['class' => 'control-label']) !!}
    <?php $sms_groups= App\Models\Sms_group::pluck('name','id')->prepend('Select Group','');
         //dd($sms_groups);
      ?>
    {!! Form::select('sms_group_id',$sms_groups, null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('sms_group_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('message') ? 'has-error' : ''}}">
    {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
    {!! Form::textarea('message', null, ('required' == 'required') ? ['class' => 'form-control sms_message', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('send_time') ? 'has-error' : ''}}">
    {!! Form::label('send_time', 'Time', ['class' => 'control-label']) !!}
    {!! Form::input('datetime-local','send_time', null, (
        'required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : [
            'class' => 'form-control',
            'pattern'=>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}'
            ]) !!}
    {!! $errors->first('send_time', '<p class="help-block">:message</p>') !!}
</div>
<input type="hidden" id="timezone" name="timezone" value="+03:00">

<!-- <div class="form-group{{ $errors->has('status_id') ? 'has-error' : ''}}">
    {!! Form::label('status_id', 'Status', ['class' => 'control-label']) !!}
    <?php $statuses= App\Models\Status::where('status_category','CAMPAIGN')->pluck('name','id')->prepend('Select','') ?>
    {!! Form::select('status_id',$statuses,null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status_id', '<p class="help-block">:message</p>') !!}
</div> -->


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create Campaign', ['class' => 'btn btn-primary']) !!}
</div>

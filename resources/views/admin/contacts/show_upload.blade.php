@extends('layouts.backend')

@section('content')
  
                <div class="card">
                    <div class="card-header"> Upload Contacts</div>
                    <div class="card-body">
                        <form method="POST" 
                        action="{{ url('admin/contacts/upload')}}"
                        enctype="multipart/form-data" 
                        >

                        <div class="form-group{{ $errors->has('sms_group_id') ? 'has-error' : ''}}">
    {!! Form::label('sms_group_id', 'Sms Group', ['class' => 'control-label']) !!}

    <?php  $sms_groups= App\Models\Sms_group::pluck('name','id')->prepend('Select','')?>
    {!! Form::select('sms_group_id',$sms_groups, null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('sms_group_id', '<p class="help-block">:message</p>') !!}
</div>

                      
                        @csrf

                   <div class="form-group{{ $errors->has('csv_file') ? 'has-error' : ''}}">
                {!! Form::label('csv_file', ' Result', ['class' => 'control-label']) !!}
                 {!! Form::file('csv_file', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                 {!! $errors->first('csv_file', '<p class="help-block">:message</p>') !!}
                </div>

<div class="form-group">
    {!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}
</div>


                        </form>

                </div>
                </div>
@endsection
@extends('layouts.backend')

@section('content')
<script>
    $(document).ready(function(){

        $("#campaign").submit(function(e){

             var sms_mesage= $(".sms_message").val();
             if(sms_mesage.length > 155)
             {
                 e.preventDefault();
                alert("Message  is  too long"); 
                 return;
             }
             $("#campaign").submit();
            // return;


        });

    // alert("here");
    $('#datetimepicker').datetimepicker();


    });
    </script>
                <div class="card">
                    <div class="card-header">New Message</div>
                    <div class="card-body">
                      
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

     {!! Form::open(['url' => '/admin/campaigns/store_new_message','method'=>'POST', 'class' => 'form-horizontal', 'files' => true,'id'=>'campaign']) !!}

                 

<div class="form-group{{ $errors->has('recipients') ? 'has-error' : ''}}">
    {!! Form::label('recipients', 'Recepient(s)', ['class' => 'control-label']) !!}
    {!! Form::text('recipients', null, ('required' == 'required') ? ['class' => 'form-control',
         'required' => 'required','placeholder'=>' Use  this  format 25474...., 25473'] : ['class' => 'form-control']) !!}
    {!! $errors->first('recipients', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('message') ? 'has-error' : ''}}">
    {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
    {!! Form::textarea('message', null, ('required' == 'required') ? ['class' => 'form-control sms_message', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
</div>
<!-- <div class="form-group{{ $errors->has('send_time') ? 'has-error' : ''}}">
    {!! Form::label('send_time', 'Time', ['class' => 'control-label']) !!}
    {!! Form::text('send_time', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required','id'=>'datetimepicker'] : ['class' => 'form-control']) !!}
    {!! $errors->first('send_time', '<p class="help-block">:message</p>') !!}
</div> -->

<!-- <div class="form-group{{ $errors->has('status_id') ? 'has-error' : ''}}">
    {!! Form::label('status_id', 'Status', ['class' => 'control-label']) !!}
    <?php $statuses= App\Models\Status::where('status_category','CAMPAIGN')->pluck('name','id')->prepend('Select','') ?>
    {!! Form::select('status_id',$statuses,null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status_id', '<p class="help-block">:message</p>') !!}
</div> -->


<div class="form-group">
    {!! Form::submit('Send Message', ['class' => 'btn btn-primary']) !!}
</div>

                        {!! Form::close() !!}

                    </div>
                </div>
          
@endsection

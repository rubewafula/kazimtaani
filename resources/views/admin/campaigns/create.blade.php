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
                    <div class="card-header">Create New Campaign</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/campaigns') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/campaigns', 'class' => 'form-horizontal', 'files' => true,'id'=>'campaign']) !!}

                        @include ('admin.campaigns.form', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                </div>
          
@endsection

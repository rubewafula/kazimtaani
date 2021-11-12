@extends('layouts.backend')

@section('content')
    
                <div class="card">
                    <div class="card-header">Create New Sms_group</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/sms_group') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/sms_group', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.sms_group.form', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                </div>
            
@endsection

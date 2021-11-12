@extends('layouts.backend')

@section('content')
 
                <div class="card">
                    <div class="card-header">Edit Sms_in #{{ $sms_in->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/sms_in') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($sms_in, [
                            'method' => 'PATCH',
                            'url' => ['/admin/sms_in', $sms_in->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.sms_in.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            
@endsection

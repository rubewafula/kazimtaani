@extends('layouts.backend')

@section('content')

                <div class="card">
                    <div class="card-header">Edit Sms_group #{{ $sms_group->id }}</div>
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

                        {!! Form::model($sms_group, [
                            'method' => 'PATCH',
                            'url' => ['/admin/sms_group', $sms_group->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.sms_group.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
           
@endsection

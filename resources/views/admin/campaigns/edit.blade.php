@extends('layouts.backend')

@section('content')
  
                <div class="card">
                    <div class="card-header">Edit Campaign #{{ $campaign->id }}</div>
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

                        {!! Form::model($campaign, [
                            'method' => 'PATCH',
                            'url' => ['/admin/campaigns', $campaign->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.campaigns.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            
@endsection

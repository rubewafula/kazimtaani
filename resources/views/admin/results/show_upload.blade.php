@extends('layouts.backend')

@section('content')
  
                <div class="card">
                    <div class="card-header"> Upload Results</div>
                    <div class="card-body">
                        <form method="POST" 
                        action="{{ url('admin/results/upload')}}"
                        enctype="multipart/form-data" 
                        >


                        <div class="form-group">
                        {!! Form::label('sitting', 'Month', ['class' => 'control-label']) !!}
                        {!! Form::text('sitting', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                        {!! $errors->first('sitting', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group">
                        {!! Form::label('year', 'Year', ['class' => 'control-label']) !!}
                        {!! Form::text('year', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                        {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
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
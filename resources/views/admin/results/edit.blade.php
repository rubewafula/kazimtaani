@extends('layouts.backend')

@section('content')

                <div class="card">
                    <div class="card-header">Edit Result #{{ $result->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/results') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($result, [
                            'method' => 'PATCH',
                            'url' => ['/admin/results', $result->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.results.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
           
@endsection

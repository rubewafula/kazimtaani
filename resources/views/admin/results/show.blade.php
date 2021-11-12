@extends('layouts.backend')

@section('content')

                <div class="card">
                    <div class="card-header">Result {{ $result->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/results') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/results/' . $result->id . '/edit') }}" title="Edit Result"><button class="btn btn-primary btn-sm"><i class="fa fa fa-pen-square" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/results', $result->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Result',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $result->id }}</td>
                                    </tr>
                                    <tr><th> Reg No </th><td> {{ $result->reg_no }} </td></tr><tr><th> Name </th><td> {{ $result->name }} </td></tr><tr><th> Course </th><td> {{ $result->course }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
           
@endsection

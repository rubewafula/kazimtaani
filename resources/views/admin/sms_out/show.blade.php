@extends('layouts.backend')

@section('content')
  
                <div class="card">
                    <div class="card-header">Sms_out {{ $sms_out->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/sms_out') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/sms_out/' . $sms_out->id . '/edit') }}" title="Edit Sms_out"><button class="btn btn-primary btn-sm"><i class="fa fa fa-pen-square" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/sms_out', $sms_out->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Sms_out',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $sms_out->id }}</td>
                                    </tr>
                                    <tr><th> Msisdn </th><td> {{ $sms_out->msisdn }} </td></tr><tr><th> Message </th><td> {{ $sms_out->message }} </td></tr><tr><th> Status Id </th><td> {{ $sms_out->status_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
           
@endsection

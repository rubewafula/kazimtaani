@extends('layouts.backend')

@section('content')
   
                <div class="card">
                    <div class="card-header">Sms_in {{ $sms_in->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/sms_in') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/sms_in/' . $sms_in->id . '/edit') }}" title="Edit Sms_in"><button class="btn btn-primary btn-sm"><i class="fa fa fa-pen-square" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/sms_in', $sms_in->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Sms_in',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $sms_in->id }}</td>
                                    </tr>
                                    <tr><th> Msisdn </th><td> {{ $sms_in->msisdn }} </td></tr><tr><th> Reference </th><td> {{ $sms_in->reference }} </td></tr><tr><th> Short Code </th><td> {{ $sms_in->short_code }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
           
@endsection

@extends('layouts.backend')

@section('content')
 
                <div class="card">
                    <div class="card-header">Campaign {{ $campaign->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/campaigns') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/campaigns/' . $campaign->id . '/edit') }}" title="Edit Campaign"><button class="btn btn-primary btn-sm"><i class="fa fa fa-pen-square" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/campaigns', $campaign->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Campaign',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $campaign->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $campaign->name }} </td></tr><tr><th> Sms Group Id </th><td> {{ $campaign->sms_group_id }} </td></tr><tr><th> Message </th><td> {{ $campaign->message }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
           
@endsection

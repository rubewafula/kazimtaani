@extends('layouts.backend')

@section('content')
  
                <div class="card">
                    <div class="card-header">Contact {{ $contact->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/contacts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/contacts/' . $contact->id . '/edit') }}" title="Edit Contact"><button class="btn btn-primary btn-sm"><i class="fa fa fa-pen-square" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/contacts', $contact->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Contact',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                    </tr>
                                    <tr><th> Msisdn </th>
                                    <td> {{ $contact->msisdn }} </td></tr>
                                    <tr><th> Sms Group  </th><td> {{ $contact->sms_group->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            
@endsection

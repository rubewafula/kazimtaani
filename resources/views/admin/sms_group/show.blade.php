@extends('layouts.backend')

@section('content')
   <script>
$(document).ready( function () {
    $('#contacts').DataTable();
} );

   </script>
                <div class="card">
                    <div class="card-header"> {{ $sms_group->name }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/sms_group') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/sms_group/' . $sms_group->id . '/edit') }}" title="Edit Sms_group"><button class="btn btn-primary btn-sm"><i class="fa fa fa-pen-square" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/sms_group', $sms_group->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Sms_group',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                
                                    <tr><th> Name </th><td> {{ $sms_group->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>
                    
                        <h4> Contacts</h4>
                        <div class="table-responsive">
                            <table class="table table-borderless"  id="contacts">
                                <thead style="background-color:#717384;">
                                    <tr style="color:#fff">
                                       <th>Msisdn</th>
                                       <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sms_group->contacts as $item)
                                    <tr>
                                        <td>{{ $item->msisdn }}</td>
                                       
                                        <td>
                                        <a href="{{ url('/admin/contacts/' . $item->id) }}" title="View Contact"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
           
@endsection

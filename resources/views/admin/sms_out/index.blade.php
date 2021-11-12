@extends('layouts.backend')

@section('content')
  
                <div class="card">
                    <div class="card-header">Sent SMS </div>
                    <div class="card-body">
                       
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/sms_out', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead style="background-color:#717384;">
                                    <tr style="color:#fff">
                                        <th>Msisdn</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sms_out as $item)
                                    <tr>
                                        <td>{{ $item->msisdn }}</td>
                                        <td>{{ $item->message }}</td>
                                        <td>
                                            @if(!empty($item->status))
                                            {{ $item->status->name }}
                                           @endif
                                        </td>
                                        <td>
                                        @if($item->status_id == 4 || $item->status_id == 5 ||  $item->status_id == 1)
                                        {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/sms_out', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete User',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        @endif

                                        </td>
                                       
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $sms_out->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
           
@endsection

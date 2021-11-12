@extends('layouts.backend')

@section('content')
   
                <div class="card">
                    <div class="card-header">Campaigns</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/campaigns/create') }}" class="btn btn-success btn-sm" title="Add New Campaign">
                            <i class="fa fa-plus" aria-hidden="true"></i> Run a New Campaign
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/campaigns', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                        <th>Name</th>
                                        <th>SMS Group </th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($campaigns as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if(!is_null($item->sms_group))

                                            {{ $item->sms_group->name }}
                                            @endif
                                        </td>
                                        <td>{{ $item->message }}</td>
                                        <td>
                                            @if(!is_null($item->status))
                                            {{$item->status->name}}
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/campaigns/' . $item->id) }}" title="View Campaign"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/campaigns/' . $item->id . '/edit') }}" title="Edit Campaign"><button class="btn btn-primary btn-sm"><i class="fa fa fa-pen-square" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/campaigns', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Campaign',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $campaigns->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
           
@endsection

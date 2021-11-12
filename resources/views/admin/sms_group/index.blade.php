@extends('layouts.backend')

@section('content')
    
                <div class="card">
                    <div class="card-header">Sms_group</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/sms_group/create') }}" class="btn btn-success btn-sm" title="Add New Sms_group">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/sms_group', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                        <th>#</th><th>Name</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sms_group as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                        <!-- <a href="{{ url('/admin/c/' . $item->id) }}" title="Address book"><button class="btn btn-success btn-sm"><i class="fa fa-address-book" aria-hidden="true"></i></button></a> -->

                                            <a href="{{ url('/admin/sms_group/' . $item->id) }}" title="View Sms_group"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/sms_group/' . $item->id . '/edit') }}" title="Edit Sms_group"><button class="btn btn-primary btn-sm"><i class="fa fa fa-pen-square" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/sms_group', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Sms_group',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $sms_group->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
         
@endsection

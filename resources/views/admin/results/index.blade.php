@extends('layouts.backend')

@section('content')
<script>
$(document).ready( function () {
    $('#results').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
} );

   </script>
                <div class="card">
                    <div class="card-header">Results</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/results/create') }}" class="btn btn-primary btn-sm" title="Add New Result">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <!-- {!! Form::open(['method' => 'GET', 'url' => '/admin/results', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!} -->

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless" id="results">
                                <thead style="background-color:#717384;font:blue">
                                    <tr style="color:#fff">
                                        <th>Reg No</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th> Results</th>
                                        <th> Period</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $item)
                                    <tr>
                                        <td>{{ $item->reg_no }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->course }}</td>
                                        <td> {{$item->scores}} </td>
                                        <td> {{$item->sitting}} - {{$item->year}} </td>
                                        <td>
                                            <a href="{{ url('/admin/results/' . $item->id) }}" title="View Result"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/results/' . $item->id . '/edit') }}" title="Edit Result"><button class="btn btn-primary btn-sm"><i class="fa fa fa-pen-square" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/results', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Result',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
      
                        </div>

                    </div>
                </div>
           
@endsection

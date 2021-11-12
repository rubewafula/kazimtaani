@extends('layouts.backend')

@section('content')

<div class="card">
    <div class="card-header">KAZI MTAANI TARGET AREAS</div>
    <div class="card-body">
        {!! Form::open(['method' => 'GET', 'url' => '/admin/target-areas', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search...">
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
            <table class="table small tabled-stripped">

                <thead class="thead-light">
                    <tr>
                        <th>NO</th>
                        <th>COUNTY</th>
                        <th>SUB-COUNTY</th>
                        <th>WARD</th>
                        <th>VILLAGE</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($areas as $area)
                    <tr>
                        
                        <td>{{ $area->number }}</td>
                        <td>{{ $area->county}}</td>
                        <td> {{$area->sub_county}}</td>
                        <td> {{$area->ward}}</td>
                        <td> {{$area->village}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination"> {!! $areas->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>

                </div>
            </div>
        
@endsection


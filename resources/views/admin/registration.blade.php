@extends('layouts.backend')

@section('content')

<div class="card">
    <div class="card-header">KAZI MTAANI REGISTRATIONS</div>
    <div class="card-body">
        {!! Form::open(['method' => 'GET', 'url' => '/admin/registrations', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                        <th>NAME</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>DISABLED</th>
                        <th>PHONE NUMBER</th>
                        <th>NATIONAL ID</th>
                        <th>SERIAL NUMBER</th>
                        <th>BIRTH PLACE</th>
                        <th>COUNTY</th>
                        <th>SUB-COUNTY</th>
                        <th>WARD</th>
                        <th>RESIDENCE</th>
                        <th>VILLAGE</th>
                        <th>EDUCATION</th>
                        <th>SKILL</th>
                        <th>PREFERRED JOB</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($registrations as $registration)
                    <tr>
                        
                        <td><a href="{{ url('/admin/registration', $registration->id) }}">{{ $registration->names }}</a></td>
                        <td>{{ $registration->dob}}</td>
                        <td> {{$registration->gender}}</td>
                        <td> {{$registration->disabled}}</td>
                        <td> {{$registration->phone_number}}</td>
                        <td> {{$registration->national_id}}</td>
                        <td> {{$registration->id_serial_number}}</td>
                        <td> {{$registration->district_of_birth}}</td>
                        <td> {{$registration->county}}</td>
                        <td> {{$registration->sub_county}}</td>
                        <td> {{$registration->ward}}</td>
                        <td> {{$registration->residence}}</td>
                        <td> {{$registration->village}}</td>
                        <td> {{$registration->education}}</td>
                        <td> {{$registration->skill_level}}</td>
                        <td> {{$registration->preferred_job}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination"> {!! $registrations->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>

                </div>
            </div>
        
@endsection


@extends('layouts.backend')

@section('content')

<div class="card">
    <div class="card-header">KAZI MTAANI REGISTRATIONS</div>
    <div class="card-body">
        {!! Form::open(['method' => 'GET', 'url' => '/admin/registrations', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}

        <div class="input-group mr-1">
            <select class="counties-select form-control " name="county"   >
                @foreach($counties as $county)
                     <option value="{{$county->county}}">{{$county->county}}</option>
                @endforeach
            </select>

        </div>
        <div class="input-group mr-1">
            <select class="sub-counties-select form-control" name="sub-county"  >
                     <option></option>
            </select>
        </div>
        <div class="input-group mr-1">
            <select class="wards-select form-control" name="ward"   >
                     <option></option>
            </select>
        </div>
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Filter...">
            <span class="input-group-append">
                <button class="btn btn-secondary" type="submit">
                    <i class="fa fa-search"> Filter</i>
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
@section('extra-js')
<style>
.select2-container .select2-selection--single{
   height:37px !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
   
   color:#858796 !important;
   line-height:35px !important;
}
.select2-container--default .select2-selection--single {
  border: 1px solid #d1d3e2;
}
</style>
<script>
    $(document).ready(function() {
        var select2Counties = $('.counties-select');
        var select2SubCounties = $('.sub-counties-select');
        var select2Wards = $('.wards-select');
        var selected_counties= @json($selected_county);
        var selected_sub_counties= @json($sub_county);
        var selected_wards= @json($ward);

        select2Counties.select2(
          { 
            placeholder: "Select County",
            allowClear: true ,
            width: "180px",
            
         }
        );

        select2SubCounties.select2(
          { 
            placeholder: "Select Sub-county",
            width: "180px",
            allowClear: true 
         }
        );

        select2Wards.select2(
          { 
            placeholder: "Select Ward",
            width: "180px",
            allowClear: true 
         }
        );
        $('.counties-select').on('change', function (e) {
            var selected = [];
            select2Counties.select2('data').forEach(function(ob){
                selected = [...selected, ob.text];
            });
           $.ajax({
              headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Content-Type': 'application/json',
                },
              method: "POST",
              url: "/admin/registration/sub-counties",
              data:JSON.stringify({"county":selected})
            })
              .done(function( data ) {
                  select2Wards.val([]).trigger('change')
                  var option = null;
                  data.forEach(function(d) {
                      option= new Option(d.sub_county, d.sub_county, false, false); 
                      select2SubCounties.append(option);
                  });
                  if(selected_sub_counties){
                      select2SubCounties.val(selected_sub_counties).trigger('change')
                  } else {
                      select2SubCounties.val([]).trigger('change')
                  }
                  selected_sub_counties=null;
            });
        });

        $('.sub-counties-select').on('change', function (e) {
            var selected = [];
            select2SubCounties.select2('data').forEach(function(ob){
                selected = [...selected, ob.text];
            });
           $.ajax({
              headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Content-Type': 'application/json',
                },
              method: "POST",
              url: "/admin/registration/wards",
              data:JSON.stringify({"sub-county":selected})
            })
              .done(function( data ) {
                  var option = null;
                  data.forEach(function(d) {
                      option= new Option(d.ward, d.ward, false, false); 
                      select2Wards.append(option);
                  });
                  if(selected_wards){
                     select2Wards.val(selected_wards).trigger('change')
                  } else {
                      select2Wards.val([]).trigger('change')
                  }
                  selected_wards = null;

            });
        });

        if(selected_counties){
            select2Counties.val(selected_counties).trigger('change')
        }
    });

    </script>
@endsection

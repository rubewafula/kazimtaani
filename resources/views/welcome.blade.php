@extends('layouts.app')
 @section('content')
    <div style="margin-top:50px;" class="container">

      <h3 class="text-center reg_title"> <strong>Kazi Mtaani Registration</strong> </h3>

       <div class="card shadow-sm">


       <div  style="padding:10px;" id="smartwizard">
        <ul>
          <li><a href="#step-1">Step 1<br /><small>Personal Details</small></a></li>
          <li><a href="#step-2">Step 2<br /><small>National ID Details</small></a></li>
          <li><a href="#step-3">Step 3<br /><small>Location Details</small></a></li>
          <li><a href="#step-4">Step 4<br /><small>Education & Skill level</small></a></li>
          <li><a href="#step-5">Step 5<br /><small>Alternative payment details</small></a></li>
          
        </ul>
        <div>

          <!-- <form action="" method="post"> -->
            @csrf
            <div style="padding: 15px;" id="step-1">
            
              <div class="row">

              <div class="col-md-6">
                <label class="form-label" for="">First Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="Enter Your First Name" required>
              </div>

              <div class="col-md-6">
                <label class="form-label" for="">Middle Name</label>
                <input type="text" class="form-control" name="middle_name" placeholder="Enter Your Middle Name" required>
              </div>

            </div>

            <div class="row mt-3">

              <div class="col-md-6">
                <label class="form-label" for="">Last Name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Enter Your Last Name" required>
              </div>
              
              <div class="col-md-6">
                <label class="form-label" for="">Date Of Birth</label>
                <input type="date" class="form-control" name="dob" max="<?php echo date('Y-m-d', strtotime('18 years ago'));?>"  required>
              </div>

            </div>

            <div class="row mt-3">

              <div class="col-md-6">
                <label class="form-label" for="">Gender</label>
                <select required class="form-control">
                  <option value="">Select gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
              
              <div class="col-md-6">
                <label class="form-label" for="">Do you have any disability</label>
                <select required class="form-control">
                  <option value="no">No</option>
                  <option value="yes">Yes</option>
                </select>
              </div>

            </div>

            <div class="row mt-3">

            <div class="col-md-6">
              <label class="form-label" for="">Phone Number</label>
              <input type="number" class="form-control" name="phone" placeholder="Enter Your Phone Number" required>
            </div>

            </div>


          </div>


          <div style="padding: 15px;" id="step-2">
            
            <div class="row mt-3">

              <div class="col-md-6">
                <label class="form-label" for="">Serial No</label>
                <input type="number" class="form-control" name="id_serial_no" placeholder="Enter Id Serial No" required>
              </div>

              <div class="col-md-6">
                <label class="form-label" for="">ID No</label>
                <input type="number" class="form-control" name="id_no" placeholder="Enter Id No" required>
              </div>
            
            </div>

          
          <div class="row mt-3">

            <div class="col-md-6">
              <label class="form-label" for="">Ditrict of Birth</label>
              <select name="district" required class="form-control">
                  <option value="">Select District</option>
              </select>
            </div>

          </div>


          </div>


          <div style="padding: 15px;" id="step-3" class="">
             <div class="row mt-3">

              <div class="col-md-6">
                <label class="form-label" for="">County</label>
                <select onchange="get_subcounties()"  id="county" name="county" required class="form-control select2">
                    <option value="">Select County</option>
                    @foreach($areas as $county)
                    <option value="{{$county->county}}">{{$county->county}}</option>
                    @endforeach
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label" for="">Sub County</label>
                <select  onchange="get_wards()" id="sub_county" name="sub_county" required class="form-control select2">
                    <option value="">Select Sub County</option>
                </select>
              </div>

            </div>

            <div class="row mt-3">

              <div class="col-md-6">
                <label class="form-label" for="">Ward</label>
                <select  onchange="get_villages()" id="ward" name="ward" required class="form-control select2">
                    <option value="">Select Ward</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label" for="">Village</label>
                <select id="village" name="village" required class="form-control">
                    <option value="">Select Village</option>
                </select>
              </div>

            </div>

            <div class="row mt-3">

            <div class="col-md-6">
              <label class="form-label" for="">Residence</label>
              <input type="text" class="form-control" name="residence" placeholder="Enter Your Residence" required>
            </div>

            </div>


            </div>
          

          <div style="padding: 15px;" id="step-4" class="">
           
           
            <div class="row mt-3">

              <div class="col-md-6">
                <label class="form-label" for="">Level of education</label>
                <select name="education_level" required class="form-control">
                    <option value="primary">Primary</option>
                    <option value="Secondary">Secondary</option>
                    <option value="Undergraduate">Undergraduate</option>
                    <option value="Vocational/Technical school">Vocational/Technical school</option>
                    <option value="Graduate">Graduate</option>
                    <option value="Masters">Masters</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label" for="">Skill level</label>
                <select name="skill_level" required class="form-control">
                    <option value="Skilled - Industrial trade">Skilled - Industrial trade</option>
                    <option value="Skilled - Service trade">Skilled - Service trade</option>
                    <option value="Semi-skilled">Semi-skilled</option>
                    <option value="Un-skilled">Un-skilled</option>
                </select>
              </div>

            </div>

            <div class="row mt-3">

            <div class="col-md-6">
                <label class="form-label" for="">Preffered Job</label>
                <input type="text" class="form-control" name="preffered_job" placeholder="Enter Your Preffered Job" required>
              </div>

            </div>


          </div>


          <div style="padding: 15px;" id="step-5" class="">

            <div class="row mt-3">

                <div class="col-md-6">
                  <label class="form-label" for="alternate_payment_person">Name of alternate payment person</label>
                  <input type="text" class="form-control" name="alternate_payment_person" placeholder="Enter  Person's Id Serial No">
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="">ID No</label>
                  <input type="number" class="form-control" name="alternate_payment_person_id_no" placeholder="Enter  Person's Id No">
                </div>

            </div>

          <div class="row mt-3">

            <div class="col-md-6">
              <label class="form-label" for="">Phone No</label>
              <input type="number" class="form-control" name="alternate_payment_person_phone" placeholder="Enter Person's Phone">
            </div>

          </div>
              
          </div>


       </div>
          <!-- </form> -->


      </div>
    @endsection
    @section('extra-js')
    <script>

    $('.select2').select2({
      placeholder: 'Select an option'
    });

    function get_subcounties(){

      var county = document.getElementById("county").value;
        $('#sub_county').children().remove();
        $('#sub_county').append( '<option value="">Select Sub County</option>');
        
        $.ajax({
                url: '/api/get-subcounties',
                type: 'POST',
                data: {county:county},
                success: function (data) { 
                    var length = data.length;
                    for (i = 0; i < length; i++)
                    { 
                        $('#sub_county').append( '<option value="'+data[i].sub_county+'">'+data[i].sub_county+'</option>' );
                    }
                }
          });
          

    }

    function get_wards(){

        var sub_county = document.getElementById("sub_county").value;
        console.log("sub_county => " + sub_county);
        $('#ward').children().remove();
        $('#ward').append( '<option value="">Select Ward</option>');
        
        $.ajax({
                url: '/api/get-wards',
                type: 'POST',
                data: {sub_county:sub_county},
                success: function (data) { 
                  console.log("Wards => "+JSON.stringify(data));
                    var length = data.length;
                    for (i = 0; i < length; i++)
                    { 
                        $('#ward').append( '<option value="'+data[i].ward+'">'+data[i].ward+'</option>' );
                    }
                }
          });
         

    }

    function get_villages(){

      var ward = document.getElementById("ward").value;

      $('#village').children().remove();
      $('#village').append( '<option value="">Select Village</option>');

      $.ajax({
              url: '/api/get-villages',
              type: 'POST',
              data: {ward:ward},
              success: function (data) { 
                  var length = data.length;
                  for (i = 0; i < length; i++)
                  { 
                      $('#village').append( '<option value="'+data[i].village+'">'+data[i].village+'</option>' );
                  }
              }
        });

    }

    </script>

    @endsection
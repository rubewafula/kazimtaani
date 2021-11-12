@extends('layouts.app')
 @section('content')
    <div style="margin-top:50px;" class="container">
      <div  style="padding:10px;" id="smartwizard">
        <ul>
          <li><a href="#step-1">Step 1<br /><small>Personal Details</small></a></li>
          <li><a href="#step-2">Step 2<br /><small>National ID Details</small></a></li>
          <li><a href="#step-3">Step 3<br /><small>Location Details</small></a></li>
          <li><a href="#step-4">Step 4<br /><small>Education</small></a></li>
          <li><a href="#step-5">Step 5<br /><small>Skill level</small></a></li>
          <li><a href="#step-5">Step 6<br /><small>Alternative payment details</small></a></li>
          
        </ul>
        <div>
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
          

          <div style="padding: 15px;" id="step-4" class="">
           
            <div class="row mt-3">

            <div class="col-md-6">
              <label class="form-label" for="">County</label>
              <select name="county" required class="form-control">
                  <option value="">Select County</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="">Sub County</label>
              <select name="sub_county" required class="form-control">
                  <option value="">Select Sub County</option>
              </select>
            </div>

            </div>


            <div class="row mt-3">

            <div class="col-md-6">
              <label class="form-label" for="">Ward</label>
              <select name="ward" required class="form-control">
                  <option value="">Select Ward</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="">Sub County</label>
              <select name="sub_county" required class="form-control">
                  <option value="">Select Sub County</option>
              </select>
            </div>

            </div>


          </div>

            <div style="padding: 15px;" id="step-5" class="">
              <div class="row">
                <div class="col-md-12"><span>Thanks For submitting your details with BBBootstrap.com. we will send you a confirmation email. We will review your details and revert back.</span></div>
              </div>
            </div>

            <div style="padding: 15px;" id="step-6" class="">
              <div class="row">
                <div class="col-md-12"><span>Thanks For submitting your details with BBBootstrap.com. we will send you a confirmation email. We will review your details and revert back.</span></div>
              </div>
            </div>

          </div>
        </div>
      </div>
    @endsection
      
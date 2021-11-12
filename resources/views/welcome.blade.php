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
                <input type="date" class="form-control" name="dob"  required>
              </div>

            </div>
          </div>
          <div style="padding: 15px;" id="step-2">
            <div class="row">
              <div class="col-md-6"><input type="text" class="form-control" placeholder="Address" required></div>
              <div class="col-md-6"><input type="text" class="form-control" placeholder="City" required></div>
            </div>
            <div class="row mt-3">
              <div class="col-md-6"><input type="text" class="form-control" placeholder="State" required></div>
              <div class="col-md-6"><input type="text" class="form-control" placeholder="Country" required></div>
            </div>
          </div>
          <div style="padding: 15px;" id="step-3" class="">
            <div class="row">
              <div class="col-md-6"><input type="text" class="form-control" placeholder="Card Number" required></div>
              <div class="col-md-6"><input type="text" class="form-control" placeholder="Card Holder Name" required></div>
            </div>
            <div class="row mt-3">
              <div class="col-md-6"><input type="text" class="form-control" placeholder="CVV" required></div>
              <div class="col-md-6"><input type="text" class="form-control" placeholder="Mobile Number" required></div>
            </div>
          </div>

          <div style="padding: 15px;" id="step-4" class="">
            <div class="row">
              <div class="col-md-12"><span>Thanks For submitting your details with BBBootstrap.com. we will send you a confirmation email. We will review your details and revert back.</span></div>
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
      
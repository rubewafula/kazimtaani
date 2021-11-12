@extends('layouts.app')
 @section('content')
    <div style="margin-top:50px;" class="container">

      <h3 class="text-center reg_title"> <strong>Kazi Mtaani Registration</strong> </h3>

       <div class="card shadow-sm" style="padding:20px">

            <div class="text-center">
              <img style="height:100px;width:100px;object-fit:contain;" src="{{ asset('img/success.png') }}"/>
            </div>

            <h2 class="text-center">Registration Successful</h2>

            <p  class="text-center mt-3">Your registration has beeen Received.</p>
            <p  class="text-center">You will be notified once you have been selected.</p>
              
          </div>


       </div>

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
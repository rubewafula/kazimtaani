<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\UserCounty;
use Illuminate\Support\Facades\DB;


class RegistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $selected_county = $request->get('county');
        $sub_county = $request->get('sub-county');
        $ward = $request->get('ward');
        $perPage = 50;

        $user = auth()->user();
        $allowed_counties = UserCounty::select(DB::raw('group_concat(county) as counties'))
            ->where('user_id', $user->id)->groupBy('user_id')->first();

        if (!empty($keyword) || !empty($selected_county) ||!empty($sub_county)|| !empty($ward) ) {
            $registrations = Registration::select(
                'id', DB::raw('concat(first_name, " ", other_names, " ", last_name) as names'),    
                'dob','gender', 'disabled', 'phone_number', 'national_id',
                'id_serial_number', 'district_of_birth', 'county', 'sub_county', 
                'ward', 'village', 'residence', 'education', 'skill_level', 'preferred_job'
            )->when($allowed_counties, function($query) use($allowed_counties){
                $query->whereIn('county', explode(',', $allowed_counties->counties));
            });

            if ($keyword) {
                $registrations->where(function($query) use($keyword) {
                    $query->where('first_name', 'LIKE', "%$keyword%")
                    ->orWhere('last_name', 'LIKE', "%$keyword%")
                    ->orWhere('village', 'LIKE', "%$keyword%");
                });

            }
            if($selected_county){
                $registrations->where('county', $selected_county);
            }
            if($sub_county){
                $registrations->where('sub_county', $sub_county);
            }
            if($ward){
                $registrations->where('ward', $ward);
            }


            $registrations = $registrations->latest()->paginate($perPage);

        } else {
            $registrations = Registration::select(
                'id', DB::raw('concat(first_name, " ", other_names, " ", last_name) as names'),    
                'dob','gender', 'disabled', 'phone_number', 'national_id',
                'id_serial_number', 'district_of_birth', 'county', 'sub_county', 
                'ward', 'village', 'residence', 'education', 'skill_level', 'preferred_job'
            )->when($allowed_counties, function($query) use($allowed_counties){
                $query->whereIn('county', explode(',', $allowed_counties->counties));
            })->latest()->paginate($perPage);
        }
        $counties = DB::table('county')->select(['county'])
            ->when($allowed_counties, function($query)  use ($allowed_counties) {
                $query->whereIn('county', explode(',', $allowed_counties->counties))->get();
            })->get();
        return view(
            'admin.registration', 
            compact('registrations', 'counties', 'selected_county', 'sub_county', 'ward'));
    }
    public function subCounties(Request $request){
        $counties = $request->get('county', '');
        $sub_counties = DB::table('target_area')->select(DB::raw(' distinct sub_county as sub_county'))->whereIn('county', $counties)->get();
        return $sub_counties->toArray();
    }
    public function wards(Request $request){
        $sub_counties = $request->get('sub-county', '');
        $wards = DB::table('target_area')->select(DB::raw('distinct ward as ward'))->whereIn('sub_county', $sub_counties)->get();
        return $wards->toArray();
    }

    public function save_registration(Request $request){

      $base_url = \URL::to('/');

      if(DB::table('registration')->where('national_id', '=', $request->id_no)->exists()){

        $url = $base_url."#step-2";

        \Alert::error('ID No Taken!', 'ID No has already been registered!');

        return redirect($url)->withInput();
      }


      if(DB::table('registration')->where('phone_number', '=', $request->phone)->exists()){

        $url = $base_url."#step-1";

        \Alert::error('Phone No Taken!', 'Phone No has already been registered!');
        
        return redirect($url)->withInput();
      }

        
       if($request->disabled == "yes"){
        $disabled = TRUE;
       }else{
        $disabled = FALSE;
       }
        
        
        $registration_data = [
            'first_name'=>$request->first_name,
            'other_names'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'dob'=>$request->dob,
            'gender'=>$request->gender,
            'disabled'=>$disabled,
            'phone_number'=>$request->phone,
            'national_id'=>$request->id_no,
            'id_serial_number'=>$request->id_serial_no,
            'district_of_birth'=>$request->district_of_birth,
            'county'=>$request->county,
            'sub_county'=>$request->sub_county,
            'ward'=>$request->ward,
            'village'=>$request->village,
            'residence'=>$request->residence,
            'education'=>$request->education_level,
            'skill_level'=>$request->skill_level,
            'preferred_job'=>$request->preffered_job,
            'created_at'=>now(),
            'updated_at'=>now()

        ];

        DB::table('registration')->insert($registration_data);

        $registration_id = DB::getPdo()->lastInsertId();

        if(isset($request->alternate_payment_person)){

            $alternate_data = [
                'registration_id'=>$registration_id,
                'names'=>$request->alternate_payment_person,
                'id_no'=>$request->alternate_payment_person_id_no,
                'phone_number'=>$request->alternate_payment_person_phone,
                'created_at'=>now(),
                'updated_at'=>now()
    
            ];

            DB::table('alternate_payment_person')->insert($alternate_data);

        }

        return redirect('/registration/success');

    }

    public  function success(){


        return view('success');

    }

}

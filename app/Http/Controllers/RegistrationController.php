<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
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
        $perPage = 50;

        if (!empty($keyword)) {
            $registrations = Registration::select(
                'id', DB::raw('concat(first_name, " ", other_names, " ", last_name) as names'),    
                'dob','gender', 'disabled', 'phone_number', 'national_id',
                'id_serial_number', 'district_of_birth', 'county', 'sub_county', 
                'ward', 'village', 'residence', 'education', 'skill_level', 'preferred_job')
                ->where('name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")

            ->latest()->paginate($perPage);
        } else {
            $registrations = Registration::select(
                'id', DB::raw('concat(first_name, " ", other_names, " ", last_name) as names'),    
                'dob','gender', 'disabled', 'phone_number', 'national_id',
                'id_serial_number', 'district_of_birth', 'county', 'sub_county', 
                'ward', 'village', 'residence', 'education', 'skill_level', 'preferred_job'
            )->latest()->paginate($perPage);
        }

        return view('admin.registration', compact('registrations'));
    }

    public function save_registration(Request $request){

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

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
        $selected_county = $request->get('county');
        $sub_county = $request->get('sub-county');
        $ward = $request->get('ward');
        $perPage = 50;


        if (!empty($keyword) || !empty($selected_county) ||!empty($sub_county)|| !empty($ward) ) {
            $registrations = Registration::select(
                'id', DB::raw('concat(first_name, " ", other_names, " ", last_name) as names'),    
                'dob','gender', 'disabled', 'phone_number', 'national_id',
                'id_serial_number', 'district_of_birth', 'county', 'sub_county', 
                'ward', 'village', 'residence', 'education', 'skill_level', 'preferred_job'
            );

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
            )->latest()->paginate($perPage);
        }

        $counties = DB::table('county') ->select(['county'])->get();
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
}

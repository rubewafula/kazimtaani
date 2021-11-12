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
}

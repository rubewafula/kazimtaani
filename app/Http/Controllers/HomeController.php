<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    public function welcome()
    {
        $areas = \DB::table('target_area')->select('county')->distinct()->get();
        return view('welcome',compact('areas'));
    }

    public function index()
    {
        return view('home');
    }

    public function get_subcounties(Request $request){
        $subcounties = \DB::table('target_area')->where('county',$request->county)->select('sub_county')->distinct()->get();
        return $subcounties;
    }

    public function get_wards(Request $request){
        \Log::info('sub County => '.$request->sub_county);
        $wards = \DB::table('target_area')->where('sub_county',$request->sub_county)->select('ward')->distinct()->get();
        \Log::info('wards => '.json_encode($wards));
        return $wards;
    }

    public function get_villages(Request $request){
        $villages = \DB::table('target_area')->where('ward',$request->ward)->select('village')->distinct()->get();
        return $villages;
    }

}

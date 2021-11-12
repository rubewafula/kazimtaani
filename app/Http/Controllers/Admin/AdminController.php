<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests;
use  App\Reports\MyReport;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {

        $report = new MyReport;
        $report->run();

        return view('admin.dashboard',["report"=>$report]);

      // $user= Auth::user();
      //dd($user->roles());
    //   if($user->hasRole('Administrator'))
    //   {
    //   echo  'admin';
    //   }else{
    //    echo  'not  admin';

    //   }
    }

    public  function activity_log()
    {
        $keyword = '';
        $perPage = 25;

        if (!empty($keyword)) {
            $activitylogs = Activity::where('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $activitylogs = Activity::where('causer_id',Auth::user()->id)->latest()->paginate($perPage);
        }

        return view('admin.activitylogs.index', compact('activitylogs'));

    }
}

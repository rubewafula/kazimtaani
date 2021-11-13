<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Redirect, Response, DB, Config;
use App\Utilities\ReportQueries;

class ReportController extends Controller
{


    public function lazyReport()
    {
        return view('admin/reports/report', []);
    }

    //
    public function downloadReport(Request $request)
    {
        // Retrieve any filters
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $dl_format = $request->input('dl_format');
        $network = $request->input('network');
        $report_name = $request->input('report_name');
        switch($report_name){
            case 'registrations':
                return ReportQueries::registrationsReport(
                    $report_name, $fromDate, $toDate, $county, $sub_county
                );
                break;
           default:
               return $this->lazyReport();
               break;
        }
     
    }

}


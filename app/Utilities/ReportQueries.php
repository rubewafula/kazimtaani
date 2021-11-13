<?php
namespace App\Utilities;

use Illuminate\Support\Facades\Log;
use PdfReport;
use ExcelReport;
use CSVReport;
use DB;
class ReportQueries{

    public static function registrationsReport($report_name, $from_date, $to_date, $county, $sub_county){

        #DB::enableQueryLog();
        $queryBuilder = DB::table('outbox')
            ->selectRaw("date(outbox.created_at) as DC, outbox.sender, outbox.network, sum(message_data.message_count) as credits")
            ->join('message_data', 'message_data.id', '=', 'outbox.message_id')
            ->whereRaw('date(outbox.created_at) between ? and ?', [ $from_date, $to_date ])
            ->groupBy('DC')
            ->groupBy('outbox.sender')
            ->groupBy('outbox.network')
            ->orderByDesc('date_created');

        if($network != 'all'){
            $queryBuilder->where('network', $network);
        }
        $queryBuilder->get();
        #dd(DB::getQueryLog());

        // Set Column to be displayed
        $columns = [
            'Created' => 'DC',
            'Sender' => 'sender',
            'Network' => 'network',
            'Bulk Credits' => 'credits',
        ];

        $title = ucwords(
            preg_replace(
                "/_/", 
                " ", 
                ucfirst($network) . " " .$report_name . "-from-" . $from_date . "-to-". $to_date
            )
        );
        $meta = ['Registrations between ' => $from_date . ' and ' . $to_date];
        return Report::download($queryBuilder, $columns, $title, $report_type?:'pdf', $meta);

    }
}


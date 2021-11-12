<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use  App\Models\Result;
use  App\Models\Result_upload;
use Spatie\SimpleExcel\SimpleExcelReader;
use Illuminate\Support\Facades\Log;


class Resultuploads implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
  protected $result_upload;
    public function __construct(Result_upload $result_upload)
    {
        //
        $this->result_upload =  $result_upload;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $f= public_path('storage/uploads/'.$this->result_upload->upload_file);
        $rows = SimpleExcelReader::create($f)->getRows();
        $array = $rows->toArray();

        $new_data = [];
        foreach($array as $key=>$row){
              $important_fields = array_slice($row, 0, 4);
              $important_fields = array_values($important_fields);
              $db_fields = [
              'name'=>$important_fields[1],
              'reg_no'=>$important_fields[0],
              'course'=>$important_fields[2],
               'section'=>$important_fields[3],
               'result_upload_id'=>$this->result_upload->id,
               'sitting'=>$this->result_upload->sitting,
               'year'=>$this->result_upload->year
              ];

              $others = array_slice($row,4);

              $new_data[] = array_merge($db_fields, ["scores" =>trim(implode(",", $others),',')]);
        }
          Result::insert($new_data);
          Result_upload::where('id',$this->result_upload->id)->update([
              'processed'=>1
          ]);
         Log::info($this->result_upload->id.' was  imported successfully');

    }


}

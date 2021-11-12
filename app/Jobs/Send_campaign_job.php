<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use  App\Models\Campaign;
Use App\Models\Sms_out;
use App\Models\Sms_group;

class Send_campaign_job implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

     protected $campaign;
     protected $sms_group;

    public function __construct(Campaign $campaign, Sms_group $sms_group)
    {
        //
        $this->campaign=$campaign;
        $this->sms_group= $sms_group;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        $data=[];
          foreach($this->sms_group->contacts as $contact)
          {            
             $data[]=[
                'msisdn'=>$contact->msisdn,
                'message'=>$this->campaign->message,
                'status_id'=>0,
                'created_at'=>date('Y-m-d H:i:s'),
                'send_time'=>$this->campaign->send_time,
                'campaign_id'=>$this->campaign->id
             ];
          }

          Sms_out::insert($data);
    }
}

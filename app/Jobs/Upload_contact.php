<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use  App\Models\Contact_upload;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;


class Upload_contact implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $contact_upload;

    public function __construct(Contact_upload $contact_upload)
    {
        $this->contact_upload =  $contact_upload;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      //  $contact_upload = Contact_upload::find(2);
        $f= public_path('storage/uploads/contacts/'.$this->contact_upload->file_name);
       
       $new_data=[];
       if (($handle = fopen($f, "r")) !== FALSE) {
       while (($data = fgetcsv($handle)) !== FALSE) {
           
          
              $new_data[]=[
                'sms_group_id'=>$this->contact_upload->sms_group_id,
                'msisdn'=>$data[0],
                'contact_upload_id'=>$this->contact_upload->id
              ];
              
       }
    }
          Contact::insert($new_data);
        
         Contact_upload::where('id',$this->contact_upload->id)->update([
              'processed'=>1
         ]);//
         Log::info($this->contact_upload->id.' was  imported successfully');
    
     
    }
}

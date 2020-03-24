<?php

namespace App\Mail;

use App\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivityValide extends Mailable
{
    use Queueable, SerializesModels;

    protected $path_detail_activity;
    protected $company_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($activity_id,$company_name)
    {
        $this->path_detail_activity = 'mouqarpox.neolithic.fr/activity/'.$activity_id;
        $this->company_name = $company_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->from('admin@programmingfields.com')
            ->subject('[Activité Validée] Mouqarpox')
            ->view('email.mail-activityValide')
            ->with([
                'path_detail_activity' => $this->path_detail_activity,
                'company_name' => $this->company_name,
            ]);
    }
}

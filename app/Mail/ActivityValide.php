<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivityValide extends Mailable
{
    use Queueable, SerializesModels;

    protected $path_detail_activity;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($activity_id)
    {
        $this->path_detail_activity = 'mouqarpox.neolithic.fr/activity/'.$activity_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->from('admin@programmingfields.com')
            ->view('email.mail-activityValide')
            ->with([
                'path_detail_company' => $this->path_detail_activity,
            ]);
    }
}

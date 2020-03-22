<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivityRefuse extends Mailable
{
    use Queueable, SerializesModels;

    protected $path_activity_add;
    protected $activity_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($activity_name)
    {
        $this->path_activity_add = 'mouqarpox.neolithic.fr/activity/add';
        $this->activity_name =  $activity_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@programmingfields.com')
            ->subject('[Activité Refusée] Mouqarpox')
            ->view('email.mail-activityRefuse')
            ->with([
                'path_activity_add' => $this->path_activity_add,
                'activity_name' => $this->activity_name,
            ]);
    }
}

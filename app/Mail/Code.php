<?php

namespace App\Mail;

use App\Activity;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Code extends Mailable
{
    use Queueable, SerializesModels;

    protected $path_activity;
    protected $activity_name;
    protected $code;
    protected $name_customer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($product)
    {
        $activity = Activity::findOrFail($product->activity_id);
        $user = User::findOrFail($product->order_id);

        $this->activity_name =  $activity->name;;
        $this->code =  $product->code;

        if($user->second_name)
            $this->name_customer =  $user->second_name.' ';
        if($user->first_name)
            $this->name_customer += $user->first_name;

        $this->path_activity = 'mouqarpox.neolithic.fr/activity/'.$activity->id;
    }

    // id	code	state	text	email	friend_name	friend_email
    // order_id	activity_id	created_at	updated_at

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@programmingfields.com')
            ->view('email.mail-code')
            ->with([
                'name_customer' => $this->name_customer,
                'code' => $this->code,
                'date' =>  mktime(date("d"), date("m"),date("Y")+1),
                'path_activity' => $this->path_activity,
                'activity_name' => $this->activity_name,
            ]);
    }
}

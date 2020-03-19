<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyValide extends Mailable
{
    use Queueable, SerializesModels;

    protected $path_detail_company;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company_id)
    {
        $this->path_detail_company = 'mouquarpox.neolithic.fr/company/'.$company_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->from('admin@programmingfields.com')
            ->view('email.mail-companyValide')
            ->with([
                'path_detail_company' => $this->path_detail_company,
            ]);
    }
}

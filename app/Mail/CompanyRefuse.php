<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyRefuse extends Mailable
{
    use Queueable, SerializesModels;

    protected $path_company_add;
    protected $company_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company_name)
    {
        $this->path_company_add = 'mouqarpox.neolithic.fr/company/add';
        $this->company_name =  $company_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->from('admin@programmingfields.com')
            ->view('email.mail-companyRefuse')
            ->with([
                'path_company_add' => $this->path_company_add,
                'company_name' => $this->company_name,
            ]);
    }
}

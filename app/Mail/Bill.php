<?php

namespace App\Mail;

use App\Activity;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Bill extends Mailable
{
    use Queueable, SerializesModels;

    protected $solde;
    protected $produits;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $produits,$solde)
    {
        $this->solde = $solde;
        $this->produits = $produits ;
        $this->user= $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $date = gmdate("d/m/Y",mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1));
        return $this->from('admin@programmingfields.com')
            ->view('email.mail-bill')
            ->subject('[Facture] Mouqarpox - '.$date)
            ->with([
                'solde' => $this->solde,
                'produits' => $this->produits,
                'user' => $this->user,
                'num' => 0,
            ]);
    }
}

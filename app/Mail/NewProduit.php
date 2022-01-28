<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewProduit extends Mailable
{
    use Queueable, SerializesModels;
    public $produit;
    /**
     * Create a new message instance.
     *
     * @return void
     */

  public function __construct($data)
    {
        $this->produit = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails/produit');
    }
}

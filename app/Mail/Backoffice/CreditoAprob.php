<?php

namespace App\Mail\Backoffice;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreditoAprob extends Mailable
{
    use Queueable, SerializesModels;
    public $nombre, $monto;
    public $subject = "Credito Aprobado";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->nombre = $data[0];
        $this->monto = $data[1];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.credito-aprobado');
    }
}

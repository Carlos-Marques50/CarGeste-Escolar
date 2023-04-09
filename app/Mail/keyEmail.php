<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Summary of keyEmail
 */
class keyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $detalhes;

    public function __construct($detalhes){
        $this->detalhes=$detalhes;
    }

    public function envelope(){
        return new Envelope(
            subject: 'Key Email',
        );
    }

    public function content(){
        return new Content(view:'Mail.keyMail');
    }

    public function attachments(){
        return [];
    }

    public function build(){
        return $this->from("calosmarqu@gmail.com")->subject('Pedido de Licença')->content();
    }
}

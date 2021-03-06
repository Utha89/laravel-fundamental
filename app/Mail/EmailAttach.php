<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailAttach extends Mailable
{
    use Queueable, SerializesModels;
    //Kita membuat subjectnya nya agar dinamis
    private $text;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text)
    {
         //panggil sini subject nya
         $this->text= $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.emailAttach')
            //Tambah subject
            // ->subject('Pengiriman dengan attachment')
            ->subject($this->text['subject'])
            ->attach(public_path('image/brand/1719182943829653.jpg'))
            //next ke web bikin route nya
        ;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Email;
use App\Mail\EmailAttach;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public function kirim()
    {
        # code...
        //package Email kirim ke email dituju dan Panggil class Email()
        Mail::to('pcntonk@gmail.com')->send(new Email());
        //return new Email();
    }

    public function attach()
    {
        # code...
        //package Email kirim ke email dituju dan Panggil class Email()
        Mail::to('pcntonk@gmail.com')->send(new EmailAttach());
        //return new Email();
    }
}

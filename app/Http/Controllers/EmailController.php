<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Email;
use App\Mail\EmailAttach;
use App\Models\User;
use App\Notifications\Informasi;
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

    public function attach(Request $request)
    {
        # code...
        //package Email kirim ke email dituju dan Panggil class Email()
        // Mail::to('pcntonk@gmail.com')->send(new EmailAttach());
        //dengan isi text dinamis
        $data = [
            'subject' => 'Pengiriman Barang'
        ];
        Mail::to('pcntonk@gmail.com')->send(new EmailAttach($data));
        //return new Email();
    }

    //Func notifikasi
    public function notif(Request $request)
    {
        # code...
        $user = User::first();
        $data=[
            'line1'=>'Pesanan Anda Telah Di Proses',
            'action'=> 'Klik Ok',
            'line2' => 'Batas Transfer Tanggal'

        ];
        $user->notify(new Informasi($data));
        //next ke class notification/informasi
        //dimna sebelumnya kita udah buat php artisan make:notification Informasi
    }
}

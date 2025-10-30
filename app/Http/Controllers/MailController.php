<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index($email, $message)
    {
        Mail::raw($message, function ($mail) use ($email) {
            $mail->to($email)
                ->subject('Notifikasi Transaksi Besar');
        });

        return "Email sent to $email";
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Mail\MailStudent_Teacher;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class SendEmailController extends Controller
{
    //




public function sendEmail(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'subject' => 'required|string',
        'message' => 'required|string',
        'name'=>'required|string',
        'corso'=>'required',
        'ip_address' => 'required|ip',
    ]);

    $data = [
        'email' => $request->email,
        'subject' => $request->subject,
        'bodyMessage' => $request->message,
        'name' => $request->name,
        'corso' => $request->corso,
        'ip_address' => $request->ip_address,
    ];

    // Invia l'email
    if (Mail::to('pavelfilingeri.2@proton.me')->send(new ContactMail($data))) {
        Session::put('success', 'Email inviata con successo!');
    } else {
        Session::put('error', 'Si è verificato un errore durante l\'invio dell\'email.');
    }

    return redirect()->route('index','#contact')->withInput();
}


    

}
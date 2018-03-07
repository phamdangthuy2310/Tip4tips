<?php

namespace App\Http\Controllers;

use App\Model\MessageTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageTemplatesController extends Controller
{
    //
    public function index(){
        $templates = MessageTemplate::getAllTemplate();
        return view('messagetemplates.index')->with('templates', $templates);
    }

    public function sendMail(){
        $data['title'] = "Test it from HDTutu.com";

        Mail::send('messagetemplates.mail', $data, function($message) {

            $message->to('phamdangthuy2310@gmail.com', 'Receiver Name')

                ->subject('HDTuto.com Mail');

        });

        dd("Mail Sent successfully");
    }
}

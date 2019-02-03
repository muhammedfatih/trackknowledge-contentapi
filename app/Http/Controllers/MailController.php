<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function SendActivationMail($mail, $activation_code)
    {
        Mail::html('In order to activate your account, <a href="'.env('SERVICE_ADDRESS_USER').'/users/'.$activation_code.'/activate">please click the link.</a>', function($message) use($mail) {
            $message->to($mail)->subject('TrackKnowledge Activation Mail');
        });
        return response()->json('', 200);
    }
}

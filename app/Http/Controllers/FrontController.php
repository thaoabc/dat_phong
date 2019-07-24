<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Mail;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function addFeedback(Request $request)
    {
        $input = $request->all();
        Mail::send('mailfb', array('name'=>$input["name"],'email'=>$input["email"], 'content'=>$input['comment']), function($message){
	        $message->to('quynhngu10021999@gmail.com', 'Visitor')->subject('Visitor Feedback!');
	    });
        Session::flash('flash_message', 'Send message successfully!');

        return view('form');
    }
}

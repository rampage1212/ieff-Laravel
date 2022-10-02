<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index() 
    {
    	return view('contact');
    }

    public function sendMessage(Request $request) 
    {
     	$rules = array(
            'name'   => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|between:1,65535',
            'g-recaptcha-response' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->messages()]);
        }

        $enquiry = new Contact;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->subject = $request->subject;
        $enquiry->message = $request->message;
        $enquiry->save();

        $from = $request->email;
        $collection = [];
        $collection['subject'] = $request->subject;
        $collection['replyto'] = $request->email;

        $to = 'adamwinster92@gmail.com';
        $collection['message'] = '<p><b>Name:</b> '.$request->name.'<br></p><p><b>Email:</b> '.$request->email.'<br></p><p><b>Subject:</b> '.$request->subject.'<br></p><p><b>Message:</b> '.$request->message.'<br></p>';

        \Mail::to($to)->send(new \App\Mail\MessageReceived($collection));

        return response()->json(['name'=>$request->name,'email'=>$request->email,'subject'=>$request->subject,'message'=>$request->message]);          
    }
}

<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\ContactMessage;
use Illuminate\Support\Facades\Event;

class ContactMessageController extends Controller
{
    public function getContactIndex(){
        return view('frontend.other.contact');
    }

    public function postSendMessage(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'name' => 'required|max:100',
            'subject' => 'required|max:140',
            'message' => 'required|min:10'
        ]);

        $message = new ContactMessage();
        $message->sender = $request['name'];
        $message->email = $request['email'];
        $message->subject = $request['subject'];
        $message->body = $request['message'];
        $message->save();
        Event::fire(new MessageSent($message));
        return redirect()->route('contact')->with(['success' => 'Message successfully sent']);
    }
}

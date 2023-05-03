<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\MessageForm;
use Illuminate\support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function ContactP(){
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function AddContact(){
        return view ('admin.contact.create');
    }

    public function ContactStore(Request $request){
        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now(),

        ]);

        return Redirect()->route('contact.profile')->with('success', 'Contact  added');

    }


    public function ContactH(){
        $contacts =DB::table('contacts')->first();
        return view('pages.contact',compact('contacts'));
    }

    public function ContactForm(Request $request){
        MessageForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),

        ]);
        return Redirect()->route('contact')->with('success', 'Message sent');


    }

    public function ContactMessage(){
        $message = MessageForm::all();
        return view ('admin.contact.message', compact('message'));
    }

    public function Delete($id){
        $delete = MessageForm::find($id)-> delete();
        return Redirect()->back()->with('success','Message Deleted');

    }

}

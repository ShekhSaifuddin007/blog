<?php

namespace App\Http\Controllers;

use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class VisitorController extends Controller
{
    public function addVisitor()
    {
        return view('front.visitor.add-visitor');
    }

    public function newVisitor(Request $request)
    {
        $this->validate($request, [
            'first_name'    => 'required | regex:/(^([a-zA-Z ]+)$)/u | max:20',
            'last_name'     => 'required | regex:/(^([a-zA-Z ]+)$)/u | max:20',
            'email_address' => 'required | regex:/^.+@.+$/i',
            'password'      => 'required'
        ]);


            $visitor = new Visitor();

            $visitor->first_name     = $request->first_name;
            $visitor->last_name      = $request->last_name;
            $visitor->email_address  = $request->email_address;
            $visitor->password       = bcrypt($request->password);
            $visitor->phone_number   = $request->phone_number;
            $visitor->save();

            $data = $visitor->toArray();

            Mail::send('mails.registration-mail', $data, function ($message) use ($data) {

                $message->to($data ['email_address']);
                $message->subject('Registration Confirmation Mail');

            });


            Session::put('id', $visitor->id);
            Session::put('name', $visitor->first_name.' '.$visitor->last_name);

            return redirect('/')->with('message', 'Your Registration Successful, Thank You..');


    }

    public function visitorLogout()
    {
        Session::forget('id');
        Session::forget('name');

        return redirect('/');
    }

    public function visitorLogin()
    {
        return view('front.visitor.visitor-login');
    }

    public function loginVisitor(Request $request)
    {
        $this->validate($request, [
            'email_address' => 'required',
            'password'      => 'required'
        ]);

        $visitor = Visitor::where('email_address', $request->email_address)->first();

        if (password_verify($request->password, $visitor->password))
        {
            Session::put('id', $visitor->id);
            Session::put('name', $visitor->first_name.' '.$visitor->last_name);

            return redirect('/');
        }
        else
        {
            return redirect()->back()->with('warnMessage', 'Invalid email or password..');
        }
    }

    public function emailCheck($email)
    {
        $existVisitor = Visitor::where('email_address', $email)->first();

        if ($existVisitor)
        {
            return 'This email address already exist..';
        }
    }

}

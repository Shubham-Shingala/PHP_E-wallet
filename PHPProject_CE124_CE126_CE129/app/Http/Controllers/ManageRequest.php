<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Manage_Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ManageRequest extends Controller
{
    function sendRequest(Request $req){
        if (User::where('email', '=', $req->receiver_email)->count() > 0){
            $sender_account_no=$req->sender_account_no;
            $receiver_email=$req->receiver_email;
            $amount=$req->amount;
            $sender_email=Auth::user()->email;
            $request=new Manage_Request();
            $request->sender_account_no=$sender_account_no;
            $request->sender_email=$sender_email;
            $request->receiver_email=$receiver_email;
            $request->amount=$amount;
            $request->save();
            //return Redirect::back()->with('message', 'Request sended successfully.');
            return "Request sended successfully.";
        }
        else{
            return "No Such Receiver.";
        }
    }

    function receivedRequest(){
        $receiver_email=Auth::user()->email;
        $requests=DB::table('manage__requests')->where('receiver_email',$receiver_email)->orderBy('created_at','desc')->get();
        return view('receivedRequest',compact('requests'));
    }

    function sentRequests(){
        $sender_email=Auth::user()->email;
        $requests=DB::table('manage__requests')->where('sender_email',$sender_email)->orderBy('created_at','desc')->get();
        return view('sentRequests',compact('requests'));
    }
}

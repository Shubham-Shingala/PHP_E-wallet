<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Manage_Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendRequest;
use App\Mail\ReceiveRequest;

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
            $receiver_name=DB::table('users')->select('name')->where('email',$receiver_email)->value('name');
            $data=array(
                'sender_account_no'=>$sender_account_no,
                'sender_email'=>$sender_email,
                'receiver_email'=>$receiver_email,
                'amount'=>$amount,
                'sender_name'=>Auth::user()->name,
                'receiver_name'=>$receiver_name
            );
            Mail::to(Auth::user()->email)->send(new SendRequest($data));
            Mail::to($receiver_email)->send(new ReceiveRequest($data));
            return Redirect::back()->with('message', 'Request sended successfully.');
        }
        else{
            return Redirect::back()->with('message', 'No Such Receiver.');
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

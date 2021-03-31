<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecipientMail;
use App\Mail\SenderMail;

class MakePayment extends Controller
{
    function make_payment(Request $req) {
        $from = $req->from;
        $to = $req->to;
        $amount =$req->amount;
        
        $recipient_existence=DB::table('accounts')-> where('account_no','=',$to)->count();
        if($recipient_existence) {
            $fromB=DB::table('accounts')->select('balance')->where('account_no', $from)->value('balance');
            $toB=DB::table('accounts')->select('balance')->where('account_no', $to)->value('balance');
            $recipient_email=DB::table('accounts')->select('email')->where('account_no', $to)->value('email');
            $sender_email=Auth::user()->email;
            
            if($amount < $fromB){
                    $fromB=$fromB-$amount;
                    $toB=$toB+$amount;
                    $sender_name=DB::table('accounts')->select('accountant_name')->where('account_no',$from)->value('accountant_name');
                    $recipient_name=DB::table('accounts')->select('accountant_name')->where('account_no',$to)->value('accountant_name');
                    DB::table('accounts')->where('account_no', $from)->limit(1)->update(array('balance' => $fromB));
                    DB::table('accounts')->where('account_no', $to)->limit(1)->update(array('balance' => $toB));
                    $transaction=new Transaction();
                    $transaction->sender_account_no=$from;
                    $transaction->recipient_account_no=$to;
                    $transaction->sender_email=$sender_email;
                    $transaction->recipient_email=$recipient_email;
                    $transaction->sender_name=$sender_name;
                    $transaction->recipient_name=$recipient_name;
                    $transaction->amount=$amount;
                    $transaction->save();
                    if(isset($req->received_req_id)) {
                        $received_req_id=DB::table('manage__requests')->where('id', $req->received_req_id)->limit(1)->update(array('paid' => '1'));
                    }
                    
                    $data1 = array('name'=>Auth::user()->name,'sender_account_no'=>$from,'recipient_account_no'=>$to,'amount'=>$amount,'recipient_name'=>$recipient_name,'sender_bal'=>$fromB);
                    Mail::to(Auth::user()->email)->send(new SenderMail($data1));
                    $data2 = array('name'=>$recipient_name,'sender_account_no'=>$from,'recipient_account_no'=>$to,'amount'=>$amount,'sender_name'=>Auth::user()->name,'recipient_bal'=>$toB);
                    Mail::to($recipient_email)->send(new RecipientMail($data2));

            }
            return Redirect("/transaction_history")->with('message', 'Payment is done Successfully');
        }
        else{
            return Redirect::back()->with('message', 'Account does not exist');
        }
    }

    function transactionHistory(){
        $user_email=Auth::user()->email;
        $transactions = DB::table('transactions')->where('sender_email',$user_email)->orwhere('recipient_email',$user_email)->orderBy('created_at','desc')->get();
        $transaction_existence = DB::table('transactions')->where('sender_email',$user_email)->orwhere('recipient_email',$user_email)->count();
        if($transaction_existence)
            return view('transactionHistory',compact('transactions'),compact('user_email'),compact('transaction_existence'));
        else {
            session()->flash('message', 'No Transaction Has Done Yet.');
            return view("transactionHistory");      
        }
    }
}

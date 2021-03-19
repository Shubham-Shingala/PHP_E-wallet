<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class MakePayment extends Controller
{
    function make_payment(Request $req) {
        $fromB=0;
        $toB=0;
        $recipient_email='';
        $from = $req->from;
        $to = $req->to;
        $amount =$req->amount;
        // $recipient_existance=DB::table('accounts')-> where('account_no','<=',$to)->get()->count();
        // return $recipient_existance;
        
            $data1=DB::table('accounts')->where('account_no', $from)->pluck('balance');
            $data2=DB::table('accounts')->where('account_no', $to)->pluck('balance');
            $data3=DB::table('accounts')->where('account_no', $to)->pluck('email');
            foreach ($data1 as $i) {
                $fromB=$i;
            }
            foreach ($data2 as $i) {
                $toB=$i;
            }
            foreach ($data3 as $i) {
                $recipient_email=$i;
            }
            $sender_email=Auth::user()->email;
            if($toB==0){
                return Redirect::back()->with('message', 'Account does not exist');
            }
            else{
                if($amount < $fromB){
                    $fromB=$fromB-$amount;
                    $toB=$toB+$amount;
                    DB::table('accounts')->where('account_no', $from)->limit(1)->update(array('balance' => $fromB));
                    DB::table('accounts')->where('account_no', $to)->limit(1)->update(array('balance' => $toB));
                    $transaction=new Transaction();
                    $transaction->sender_account_no=$from;
                    $transaction->recipient_account_no=$to;
                    $transaction->sender_email=$sender_email;
                    $transaction->recipient_email=$recipient_email;
                    $transaction->amount=$amount;
                    $transaction->save();
                }
                return redirect()->view('dashboard');
            }
    }

    function transactionHistory(){
        //$accounts=DB::table('accounts')->where('');
        return view('transactionHistory');
    }
}

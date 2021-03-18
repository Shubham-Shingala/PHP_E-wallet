<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MakePayment extends Controller
{
    function make_payment(Request $req) {
        $fromB=0;
        $toB=0;
        $from = $req->from;
        $to = $req->to;
        $amount =$req->amount;
        $data1=DB::table('accounts')->where('account_no', $from)->pluck('balance');
        $data2=DB::table('accounts')->where('account_no', $to)->pluck('balance');
        foreach ($data1 as $i) {
             $fromB=$i;
        }
        foreach ($data2 as $i) {
             $toB=$i;
        }
        //echo $fromB.'   '.$toB;
        if($amount < $fromB){
            $fromB=$fromB-$amount;
            $toB=$toB+$amount;
            DB::table('accounts')->where('account_no', $from)->limit(1)->update(array('balance' => $fromB));
            DB::table('accounts')->where('account_no', $to)->limit(1)->update(array('balance' => $toB));  
        }
        
    return "paied";
        
    }
}

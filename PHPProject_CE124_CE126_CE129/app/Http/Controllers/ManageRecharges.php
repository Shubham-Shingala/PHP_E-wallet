<?php

namespace App\Http\Controllers;

use App\Models\ManageRecharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\RechargeMail;
use Redirect;

class ManageRecharges extends Controller {
    public function recharge(Request $req) {
        $mobile_operator = $req->mobile_operator;
        $mob_no = $req->mob_no;
        $acc_no = $req->acc_no;
        $plan = $req->plan;
        $email = Auth::user()->email;
        $balance = DB::table('accounts')->select('balance')->where('account_no', $acc_no)->value('balance');
        if ($plan < $balance) {
            $balance = $balance - $plan;
            DB::table('accounts')->where('account_no', $acc_no)->limit(1)->update(array('balance' => $balance));
            $recharge = new ManageRecharge();
            $recharge->account_no = $acc_no;
            $recharge->plan = $plan;
            $recharge->mobile_operator = $mobile_operator;
            $recharge->mobile_no = $mob_no;
            $recharge->email = $email;
            $recharge->save();

            $data = array(
                'name' => Auth::user()->name, 
                'acc_no' => $acc_no, 
                'plan' => $plan, 
                'mobile_operator' => $mobile_operator, 
                'mob_no' => $mob_no, 
                'balance' => $balance 
            );
            Mail::to(Auth::user()->email)->send(new RechargeMail($data));

            return Redirect("/recharge_history")->with('message', 'Recharge is done Successfully');
        } else {
            return Redirect::back()->with('message', 'Account balance is not sufficient to buy plan');
        }
    }

    public function rechargeHistory() {
        $email=Auth::user()->email;
        $recharges = DB::table('manage_recharges')->where('email',$email)->orderBy('created_at','desc')->get();
        $recharges_existence=$recharges->count();
        return view('rechargeHistory',compact('recharges'),compact('recharges_existence'));
    }
}

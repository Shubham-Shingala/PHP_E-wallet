<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class AddAccount extends Controller
{
    function add_account(Request $req) {
        $username = Auth::user();
        $account_existance=DB::table('accounts')-> where('account_no','=',$req->account_no)->count();
        if(!$account_existance) {
            $user = new Account;
            $user->account_no = $req->account_no;
            $user->accountant_name = $req->accountant_name;
            $user->mobile_no = $req->mobile;
            $user->ifsc = $req->ifsc;
            $user->email = $username->email;
            $user->save();
            session()->flash('message','Account Added.');
            return redirect()->action([ViewAccount::class,'view_account']);
        }
        else {
            return Redirect::back()->with('message', 'Account Already Exist');
        }
    }
}

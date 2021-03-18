<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class AddAccount extends Controller
{
    function add_account(Request $req) {
        $username = Auth::user();
        $user = new Account;
        $user->account_no = $req->account_no;
        $user->account_name = $req->account_name;
        $user->mobile_no = $req->mobile;
        $user->ifsc = $req->ifsc;
        $user->email = $username->email;
        $user->save();
        session()->flash('message','account added.');
        return redirect()->action([ViewAccount::class,'view_account']);
        
    }
}

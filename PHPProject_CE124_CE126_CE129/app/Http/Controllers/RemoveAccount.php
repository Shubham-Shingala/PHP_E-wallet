<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RemoveAccount extends Controller
{
    function removeAccount($account_no){
        $data=DB::table('accounts')->where('account_no', $account_no)->delete();
        session()->flash('message','account removed.');
        return redirect()->action([ViewAccount::class,'view_account']);
    }
}

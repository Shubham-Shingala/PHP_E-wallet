<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ViewAccount extends Controller
{
    function view_account(){
        $email=Auth::user()->email;
        $data=DB::select("select * from accounts where email='$email'");
        return view('viewAccount',compact('data'));
    }
}

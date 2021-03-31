<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddAccount;
use App\Http\Controllers\ViewAccount;
use App\Http\Controllers\MakePayment;
use App\Http\Controllers\RemoveAccount;
use App\Http\Controllers\ManageRequest;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ManageRecharges;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('addAccount',function(){
    return view('addAccount');
});
Route::post('add',[AddAccount::class,'add_account']);

Route::middleware(['auth:sanctum', 'verified'])->get('/makePayment', function () {
    $email=Auth::user()->email;
    $data=DB::select("select account_no from accounts where email='$email'");
    return view('makePayment',compact('data'));
})->name('makePayment');

Route::get('view_account', [ViewAccount::class,'view_account'])->middleware(['auth:sanctum', 'verified'])->name('view_account');

Route::post('make_payment',[MakePayment::class,'make_payment']);

Route::get('remove_account{account_no}',[RemoveAccount::class,'removeAccount']);

Route::get('transaction_history', [MakePayment::class,'transactionHistory'])->middleware('auth')->name('transaction_history');

Route::middleware(['auth:sanctum', 'verified'])->get('/send_request', function () {
    $email=Auth::user()->email;
    $data=DB::select("select account_no from accounts where email='$email'");
    return view('sendRequest',compact('data'));
})->name('send_request');
Route::post('send',[ManageRequest::class,'sendRequest']);

Route::get('received_request', [ManageRequest::class,'receivedRequest'])->middleware('auth')->name('received_request');
Route::post('pay',function(Request $req){
    $email=Auth::user()->email;
    $data=DB::select("select account_no from accounts where email='$email'");
    return view('makePayment',compact('data'),['account_no'=>$req->account_no,'amount'=>$req->amount,'id'=>$req->id]);
});
Route::get('sent_requests', [ManageRequest::class,'sentRequests'])->middleware('auth')->name('sent_requests');

Route::middleware(['auth:sanctum', 'verified'])->get('/mobile_recharge', function () {
    $email = Auth::user()->email;
    $data = DB::select("select account_no from accounts where email='$email'");
    return view('mobileRecharge',compact('data'));
})->name('mobile_recharge');
Route::post('recharge',[ManageRecharges::class,'recharge']);
Route::get('recharge_history', [ManageRecharges::class,'rechargeHistory'])->middleware('auth')->name('recharge_history');




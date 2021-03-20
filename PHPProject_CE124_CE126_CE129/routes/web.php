<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddAccount;
use App\Http\Controllers\ViewAccount;
use App\Http\Controllers\MakePayment;
use App\Http\Controllers\RemoveAccount;
use App\Http\Controllers\ManageRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('add',[AddAccount::class,'add_account']);

Route::get('addAccount',function(){
    return view('addAccount');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/makePayment', function () {
    $email=Auth::user()->email;
    $data=DB::select("select account_no from accounts where email='$email'");
    return view('makePayment',compact('data'));
})->name('makePayment');

Route::get('view_account', [ViewAccount::class,'view_account'])->middleware('auth')->name('view_account');

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

Route::get('pay{account_no},{amount}',function($account_no,$amount){
    $email=Auth::user()->email;
    $data=DB::select("select account_no from accounts where email='$email'");
    return view('makePayment',compact('data'),['account_no'=>$account_no,'amount'=>$amount]);
});
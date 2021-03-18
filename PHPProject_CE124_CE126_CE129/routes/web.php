<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Controllers\AddAccount;
use App\Http\Controllers\ViewAccount;
use App\Http\Controllers\MakePayment;
use App\Http\Controllers\RemoveAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
>>>>>>> fa0981a5bb569547121c497be90b0034831e4163

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
<<<<<<< HEAD
=======

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
>>>>>>> fa0981a5bb569547121c497be90b0034831e4163

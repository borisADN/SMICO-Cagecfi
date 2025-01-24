<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OperationViewsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get("/", function () {
    return view("login");
});
//HOME_CONTROLLER
route::get('/home', [HomeController::class, 'index'])->name('home');

//API_CONTROLLER
Route::post('/login', [ApiController::class, 'Apilogin'])->name('login');
Route::post('/checkBalance', [ApiController::class,'checkBalance'])->name('checkBalance');
Route::post('/accountTransfert', [ApiController::class,'accountTransfert'])->name('accountTransfert');
Route::post('/commissionViremt', [ApiController::class,'commissionVirement'])->name('commissionVirement');
Route::post('/getReceiverInfo_virement', [ApiController::class,'getReceiverInfo_virement'])->name('getReceiverInfo_virement');
Route::post('/virementProcess', [ApiController::class,'virementProcess'])->name('virementProcess');
Route::post('b2wTransaction', [ApiController::class,'BankToWallet'])->name('BankToWallet');
Route::post('w2bTransaction', [ApiController::class,'WalletToBank'])->name('WalletToBank');
Route::post('miseDispo', [ApiController::class,'miseDispo'])->name('miseDispo');

//OPERATION_VIEWS_CONTROLLER
Route::get('trsftCpte', [OperationViewsController::class, 'AccountTransfer']);
Route::get('viremtCpte', [OperationViewsController::class, 'AccountVirement']);
Route::get('w2bTransaction', [OperationViewsController::class, 'WalletToBank']);
Route::get('b2wTransaction', [OperationViewsController::class, 'BankToWallet']);
Route::get('miseDispo', [OperationViewsController::class, 'miseDispo']);

// logout
// Route::get('/logout', [HomeController::class, 'logout'])->name('logout');


// Route::get('/home', function ( Request $request) {
//     $groupedOptions = $request->query('groupedOptions');
//     return view('welcome', compact('groupedOptions'));
// })->name('home');

Route::get('/logout', function () {
  
    // session()->flush();
    return redirect('/');

    
})->name('logout');



// Routes temporaires
// route::view('login', 'temporary.login');
// route::view('/form1', 'form1')->name('form1');
route::view('/form2', 'form2')->name('form2');
route::view('/form3', 'form3')->name('form3');
route::view('/form4', 'form4')->name('form4');
<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OperationViewsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get("/", function () {
    return view("login");
})->name("login");
//HOME_CONTROLLER
route::get('/home', [HomeController::class, 'index'])->name('home');

//API_CONTROLLER
Route::post('/login', [ApiController::class, 'Apilogin'])->name('login');
Route::post('/checkBalance', [ApiController::class, 'checkBalance'])->name('checkBalance');
Route::post('/accountTransfert', [ApiController::class, 'accountTransfert'])->name('accountTransfert');
Route::post('/commissionViremt', [ApiController::class, 'commissionVirement'])->name('commissionVirement');
Route::post('/getReceiverInfo_virement', [ApiController::class, 'getReceiverInfo_virement'])->name('getReceiverInfo_virement');
Route::post('/virementProcess', [ApiController::class, 'virementProcess'])->name('virementProcess');
Route::post('b2wTransaction', [ApiController::class, 'BankToWallet'])->name('BankToWallet');
Route::post('w2bTransaction', [ApiController::class, 'WalletToBank'])->name('WalletToBank');
Route::post('miseDispo', [ApiController::class, 'miseDispo'])->name('miseDispo');

//OPERATION_VIEWS_CONTROLLER
Route::get('trsftCpte', [OperationViewsController::class, 'AccountTransfer']);
Route::get('viremtCpte', [OperationViewsController::class, 'AccountVirement']);
Route::get('w2bTransaction', [OperationViewsController::class, 'WalletToBank']);
Route::get('b2wTransaction', [OperationViewsController::class, 'BankToWallet']);
Route::get('miseDispo', [OperationViewsController::class, 'MiseDispo']);
Route::get('reglFact', [OperationViewsController::class, 'ReglFacture']);
Route::get('reglAchat', [OperationViewsController::class, 'ReglAchat']);
Route::get('demandeChequier', [OperationViewsController::class, 'DemandeChequier']);
Route::get('demandeDecvt', [OperationViewsController::class, 'DemandeDecvt']);
Route::get('demandeSvce', [OperationViewsController::class, 'DemandeDesvce']);
Route::get('rechargCarte', [OperationViewsController::class, 'RechargeCarte']);

// logout
Route::get('/logout', function () {
    // session()->flush();
    return redirect('/');
})->name('logout');

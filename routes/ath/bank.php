<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;

Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::get('bank', [BankController::class, 'index'])->name('bank');
        Route::get('bank/atm', [BankController::class, 'atm'])->name('bank.atm');
        Route::post('bank/withdraw', [BankController::class, 'withdraw'])->name('bank.withdraw');
        Route::post('bank/deposit', [BankController::class, 'deposit'])->name('bank.deposit');
        Route::post('bank/transfer', [BankController::class, 'transfer'])->name('bank.transfer');
    }
);

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CervicalCancerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboard-summary');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(CervicalCancerController::class)->group( function(){
        Route::get('/cervical-cancer','index')->name('cervicalCancer.index');
        Route::get('/cervical-cancer/create', 'create')->name('cervicalCancer.create');
        Route::get('/cervical-cancer/basic-info','showBasicInfo')->name('cervicalCancer.basicInfo');
        Route::get('/cervical-cancer/clients-bio','showClient')->name('cervicalCancer.clientInfo');
        Route::get('/cervical-cancer/client-addresses','showClientAddress')->name('cervicalCancer.clientAddress');
        Route::get('/cervical-cancer/client-general-eligiblities', 'showClientGeneralEligiblity')->name('cervicalCancer.clientGeneralEligiblity');
        Route::get('/cervical-cancer/client-current-eligiblities', 'showClientCurrentEligiblity')->name('cervicalCancer.clientCurrentEligiblity');
        Route::get('/cervical-cancer/risk-classifications', 'showRiskClassification')->name('cervicalCancer.riskClassification');
        Route::get('/cervical-cancer/client-referrals', 'showClientReferral')->name('cervicalCancer.clientReferral');

        Route::get('/cervical-cancer/edit', 'edit')->name('cervicalCancer.edit');
        Route::get('/cervical-cancer/delete', 'delete')->name('cervicalCancer.destroy');
    });
});

require __DIR__.'/auth.php';

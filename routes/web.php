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
});

Route::get('/dashboard', function () {
    return view('dashboard-summary');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cervical-cancer',[CervicalCancerController::class,'index'])->name('cervicalCancer.index');
    Route::get('/cervical-cancer/create',[CervicalCancerController::class, 'create'])->name('cervicalCancer.create');
    Route::get('/cervical-cancer/view',[CervicalCancerController::class,'show'])->name('cervicalCancer.show');
    Route::get('/cervical-cancer/edit', [CervicalCancerController::class,'edit'])->name('cervicalCancer.edit');
    Route::get('/cervical-cancer/delete', [CervicalCancerController::class,'delete'])->name('cervicalCancer.destroy');
});Route::get('/cervical-cancer/preview', [CervicalCancerController::class,'preview'])->name('cervicalCancer.preview');

require __DIR__.'/auth.php';

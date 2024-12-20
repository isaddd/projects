<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ExternalLoginController;
use Filament\Pages\Dashboard;
use Filament\Facades\Filament;
use App\Http\Middleware\VerifyExpectedToken;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});
Route::post('/external-login', [ExternalLoginController::class, 'login'])->name('external.login');

// Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('login', [AuthController::class, 'login']);

// Route::middleware(['auth:sanctum', 'verify.admin.token'])->group(function () {
//     Filament::routes();  // Mengaktifkan rute admin panel Filament
// });
// Route::middleware(['auth:sanctum', 'verify.admin.token'])->get('/admin', function () {
//     return view('filament.pages.dashboard'); // Your custom Filament dashboard view
// })->name('filament.dashboard');


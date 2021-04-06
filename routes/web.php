<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyDashboardController;
use App\Http\Controllers\CompanyStaffController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/{company}/dashboard', [CompanyDashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('company.dashboard');

Route::resource('/{company}/staff', CompanyStaffController::class)
    ->middleware(['auth']);

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\Auth\RegisteredUserController;

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
    return redirect('/login');
});

Route::get('/register/{token}', [RegisteredUserController::class, 'registration_view'])->middleware('guest')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('accept');
Route::get('/register', function () {
    return redirect('/login');
});


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [StaffController::class, 'policiesStaff']);
    Route::get('/policy/{id}', [PolicyController::class, 'index']);



    Route::middleware(['role'])->group(function () {
        

        Route::get('/stafflist', [AdminController::class, 'allStaff']);
        Route::get('/stafflist/{id}', [AdminController::class, 'detailsStaff']);


        Route::post('/stafflist/updateStaff', [StaffController::class, 'updateStaff']);
        Route::post('/stafflist/removeStaff', [StaffController::class, 'removeStaff']);
    
        Route::post('/stafflist/updatePolicy', [PolicyController::class, 'updatePolicy']);
        Route::post('/stafflist/removePolicy', [PolicyController::class, 'removePolicy']);

        Route::post('/stafflist/invite', [InvitationController::class, 'process_invites']);
    });

});






require __DIR__.'/auth.php';

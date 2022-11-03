<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegisterEmployeeController;
use App\Http\Controllers\MarketController;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Node\Query;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'loginStore'])->middleware('guest');

Route::get('/register/member', [LoginController::class, 'indexRegisterMember'])->middleware('guest');
Route::post('/register/member', [LoginController::class, 'registerMemberStore'])->middleware('guest');

Route::get('/register/employee', [RegisterEmployeeController::class, 'index'])->middleware('type:superadmin');
Route::post('/register/employee', [RegisterEmployeeController::class, 'store'])->middleware('type:superadmin');

Route::resource('/dashboard/member', MemberController::class)->middleware('type:member');

Route::get('/employee/delete', [EmployeeController::class, 'destroy'])->middleware('type:superadmin');
Route::get('/employee/edit-login/{id}', [EmployeeController::class, 'editLogin'])->middleware('type:superadmin');
Route::resource('/dashboard/employee', EmployeeController::class)->middleware('type:superadmin');
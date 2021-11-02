<?php

use App\Http\Livewire\CertificationCreator;
use App\Http\Livewire\Department\DepartmentCreator;
use App\Http\Livewire\Department\DepartmentList;
use App\Http\Livewire\LicenseList;
use App\Models\License;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
    $licenses = License::all();
    // dd($licenses->pluck('license_certification')->toArray());
    return view('create_license')->with(compact('licenses'));
})->name('dashboard')->middleware('auth');
Route::get('license/create', CertificationCreator::class)->name('license.create')->middleware('auth');
Route::get('department/create', DepartmentCreator::class)->name('department.create')->middleware('auth');
Route::get('license', LicenseList::class)->name('license.index')->middleware('auth');
Route::get('department', DepartmentList::class)->name('department.index')->middleware('auth');

Route::get('/login', function () {

    return view('login');
})->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::post('/login', function (Request $request) {

    $credentials = [
        'samaccountname' => $request->username,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        return redirect()->route('dashboard');
    } else {
        dd('here');
    }
})->name('login.post');

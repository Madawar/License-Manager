<?php

use App\Http\Livewire\CertificationCreator;
use App\Http\Livewire\Department\DepartmentCreator;
use App\Http\Livewire\Department\DepartmentList;
use App\Http\Livewire\LicenseList;
use App\Models\License;
use Illuminate\Support\Facades\Route;

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
});
Route::get('license/create', CertificationCreator::class)->name('license.create');
Route::get('department/create', DepartmentCreator::class)->name('department.create');
Route::get('license', LicenseList::class)->name('license.index');
Route::get('department', DepartmentList::class)->name('department.index');

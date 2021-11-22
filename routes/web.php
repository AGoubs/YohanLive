<?php

use App\Http\Livewire\Accueil;
use App\Http\Livewire\AddHost;
use App\Http\Livewire\Auth\CreateUser;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Billing;
use App\Http\Livewire\CreateEvent;
use App\Http\Livewire\EditEvent;
use App\Http\Livewire\EditHost;
use App\Http\Livewire\Event;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tables;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;

use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;
use App\Http\Livewire\ShowEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

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


Route::get('/', Login::class)->name('login');
Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');


Route::group(['middleware' => ['auth']], function () {
  /**
   * Dashboard Routes
   */
  Route::get('/accueil', Accueil::class)->name('accueil');

  /**
   * Events Routes
   */
  Route::group(['prefix' => 'events'], function () {
    Route::get('/', Event::class)->name('events.index');
    Route::get('/create', CreateEvent::class)->name('events.create');
    Route::get('/show/{eventId?}', ShowEvent::class)->name('events.show');
    Route::get('/edit/{eventId}', EditEvent::class)->name('events.edit');
  });

  /**
   * Hosts Routes
   */
  Route::group(['prefix' => 'hosts'], function () {
    Route::get('/add/{eventId}', AddHost::class)->name('hosts.add');
    Route::get('/edit/{eventId}&{hostId?}', EditHost::class)->name('hosts.edit');
 
  });

  /**
   * Users Routes
   */
  Route::group(['prefix' => 'users'], function () {
    // Route::get('/', User::class)->name('users.index');
    Route::get('/create', CreateUser::class)->name('users.create');
    Route::get('/profile', UserProfile::class)->name('users.profile');
    Route::get('/change-password', ResetPassword::class)->name('users.change-password');
  });
});

<?php

use App\Http\Livewire\Accueil;
use App\Http\Livewire\AddHost;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\CreateEvent;
use App\Http\Livewire\EditEvent;
use App\Http\Livewire\EditHost;
use App\Http\Livewire\Event;

use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\ShowEvent;
use App\Http\Livewire\Users\CreateUser;
use App\Http\Livewire\Users\ShowUsers;
use App\Http\Livewire\Users\Users;
use App\Http\Livewire\UsersEvents\AssignUsers;
use App\Http\Livewire\UsersEvents\UsersEvents;

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


Route::middleware('auth')->group(function () {
  /**
   * Dashboard Routes
   */
  Route::get('/accueil', Accueil::class)->name('accueil');

  /**
   * Events Routes
   */
  Route::prefix('events')->group(function () {
    Route::get('/', Event::class)->name('events.index');
    Route::get('/show/{eventId?}', ShowEvent::class)->name('events.show');

    Route::middleware('admin')->group(function () {
      Route::get('/create', CreateEvent::class)->name('events.create');
      Route::get('/edit/{eventId}', EditEvent::class)->name('events.edit');
    });
  });

  /**
   * Hosts Routes
   */
  Route::prefix('hosts')->group(function () {
    Route::get('/add/{eventId}', AddHost::class)->name('hosts.add');
    Route::get('/edit/{eventId}&{hostId?}', EditHost::class)->name('hosts.edit');
  });

  /**
   * Users Routes
   */
  Route::prefix('users')->group(function () {
    // Route::get('/', User::class)->name('users.index');
    Route::middleware('admin')->group(function () {
      Route::get('/create', CreateUser::class)->name('users.create');
      Route::get('/', Users::class)->name('users.index');
      Route::get('/show/{userId}', ShowUsers::class)->name('users.show');
    });
    Route::get('/profile', UserProfile::class)->name('users.profile');
    Route::get('/change-password', ResetPassword::class)->name('users.change-password');
  });

   /**
   * UsersEvent Routes
   */
  Route::prefix('users-events')->group(function () {
    Route::middleware('admin')->group(function () {
      Route::get('/{userId}', UsersEvents::class)->name('users-events.index');
    });
  });

   /**
   * AssignUsers Routes
   */
  Route::prefix('assign-users')->group(function () {
    Route::middleware('admin')->group(function () {
      Route::get('/{eventId}', AssignUsers::class)->name('assign-users.index');
    });
  });
});

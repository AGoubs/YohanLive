<?php

use App\Http\Livewire\Accueil;
use App\Http\Livewire\AddHost;
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

Route::get('/', Login::class)->name('login');

Route::get('/login', Login::class)->name('login');

Route::middleware('auth')->group(function () {
  Route::get('/accueil', Accueil::class)->name('accueil');
  Route::get('/events', Event::class)->name('évènements');
  Route::get('/create/event', CreateEvent::class)->name('ajouter un evènement');
  Route::get('/show_event/{eventId?}', ShowEvent::class)->name('évènement');
  Route::get('/add_host/{eventId}', AddHost::class)->name('ajouter des hôtes');
  Route::get('/edit_event/{eventId}', EditEvent::class)->name('modifier un évènement');
  Route::get('/edit_host/{eventId}&{hostId?}', EditHost::class)->name('gestion d\'hôte');
  Route::get('/profile', Profile::class)->name('profile');
  Route::get('/tables', Tables::class)->name('tables');
  Route::get('/mes-informations', UserProfile::class)->name('mes-informations');
  Route::get('/laravel-user-management', UserManagement::class)->name('user-management');
});

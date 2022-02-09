<?php

namespace App\Http\Livewire\Auth;

use App\Models\Event;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class ResetPassword extends Component
{
  public $email = '';
  public $password = '';
  public $passwordConfirmation = '';

  public $showSuccesNotification = false;
  public $showFailureNotification = false;

  public $showDemoNotification = false;

  public $urlID = '';

  protected $rules = [
    'email' => 'required',
    'password' => 'required|same:passwordConfirmation'
  ];

  public function resetPassword()
  {
    $this->validate();
    $existingUser = User::where('email', $this->email)->first();
    if ($existingUser && $existingUser->id == auth()->id()) {
      $existingUser->update([
        'password' => Hash::make($this->password)
      ]);

      redirect('/');
    } else {
      $this->showFailureNotification = true;
    }
  }

  public function render()
  {
    return view('livewire.auth.reset-password')->layout('layouts.base');
  }
}

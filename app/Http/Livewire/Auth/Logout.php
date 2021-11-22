<?php

namespace App\Http\Livewire\Auth;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
  public $user = "";

  public function logout()
  {
    auth()->logout();
    return redirect('/');
  }

  public function render()
  {
    $this->user = Auth::user();
    $this->user = ucfirst($this->user->name);
    return view('livewire.auth.logout');
  }
}

<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Accueil extends Component
{
  public $user = "";

  public function render()
  {
    $this->user = Auth::user();
    $this->user = ucfirst($this->user->name);
    return view('livewire.accueil');
  }
}

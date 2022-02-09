<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class HostLogout extends Component
{
  public function logout()
  {
    auth()->logout();
    return redirect('/');
  }

  public function render()
  {
    return view('livewire.auth.host-logout');
  }
}

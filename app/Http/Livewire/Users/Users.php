<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
  public $users;
  public $showSuccesNotification  = false;

  public function render()
  {
    $this->users = User::orderBy('role', 'DESC')->orderBy('name', 'ASC')->get();
    return view('livewire.users.users');
  }
}

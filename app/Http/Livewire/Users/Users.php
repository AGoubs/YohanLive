<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
  public $users;

  public function render()
  {
    $this->users = User::all();
    return view('livewire.users.users');
  }

  public function deleteUser($id)
  {
    User::find($id)->delete();
    return redirect()->route('users.index');
  }
}

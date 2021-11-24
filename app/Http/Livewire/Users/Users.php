<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
  public $users;

  public function render()
  {
    $this->users = User::orderBy('role', 'DESC')->orderBy('name', 'ASC')->get();
    return view('livewire.users.users');
  }

  public function deleteUser($id)
  {
    User::find($id)->delete();
    return redirect()->route('users.index');
  }
  
  public function selectEvent($userId)
  {
    return redirect()->route('users-events.index', ['userId' => $userId]);
  }
}

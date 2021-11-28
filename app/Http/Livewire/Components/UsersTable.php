<?php

namespace App\Http\Livewire\Components;

use App\Models\User;
use Livewire\Component;

class UsersTable extends Component
{
  public $users;
  public function render()
  {
    return view('livewire.components.users-table');
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

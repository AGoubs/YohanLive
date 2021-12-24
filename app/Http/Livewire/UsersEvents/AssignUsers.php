<?php

namespace App\Http\Livewire\UsersEvents;

use Livewire\Component;

class AssignUsers extends Component
{
  public $eventId;
  public $users;
  public function render()
  {
    return view('livewire.users-events.assign-users');
  }

  public function mount()
  {
  }
}

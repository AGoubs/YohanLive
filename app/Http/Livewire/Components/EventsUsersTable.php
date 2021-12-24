<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class EventsUsersTable extends Component
{
  public $users;
  public $eventId;

  public function render()
  {
    return view('livewire.components.events-users-table');
  }
}

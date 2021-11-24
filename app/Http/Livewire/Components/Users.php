<?php

namespace App\Http\Livewire\Components;

use App\Models\EventByUser;
use App\Models\User;
use Livewire\Component;

class Users extends Component
{
  public $eventId;
  public $users = [];

  public function render()
  {
    $usersIds = EventByUser::where('event_id', $this->eventId)->pluck('user_id')->toArray();
    if ($usersIds) {
      foreach ($usersIds as $userId) {
        $this->users[] = User::where('id', $userId)->first();
      }
    }
    return view('livewire.components.users');
  }

}

<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Contact;
use App\Models\EventByUser;
use App\Models\User;
use Livewire\Component;

class QRCode extends Component
{
  public $eventId;
  public $event;
  public $user;

  public function render()
  {
    return view('livewire.q-r-code');
  }

  public function mount()
  {
    $this->contact = new Contact();
    $this->event = Event::find($this->eventId);
  }

  public function addUserInEvent($userId)
  {
    EventByUser::createEventByUser($userId, $this->eventId);

    return redirect()->route('events.show', [$this->eventId]);
    // dd($this->users);
  }
}

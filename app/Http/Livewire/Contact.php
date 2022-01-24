<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class Contact extends Component
{
  public $eventId;
  public $event;

  public function render()
  {
    $this->event = Event::getEventById($this->eventId);
    return view('livewire.contact');
  }

  public function mount()
  {
  }
}

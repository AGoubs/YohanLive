<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class AddHost extends Component
{
  public $existingEvent;

  public function render()
  {
    return view('livewire.add-host');
  }

  public function mount($eventId)
  {
    $this->existingEvent = Event::find($eventId);
  }
}

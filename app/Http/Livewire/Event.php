<?php

namespace App\Http\Livewire;

use App\Models\Event as ModelsEvent;
use Livewire\Component;

class Event extends Component
{
  public $events = [];
  public function render()
  {
    $this->events = ModelsEvent::get();
    return view('livewire.event');
  }
}

<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Host;
use Livewire\Component;

class AddHost extends Component
{
  public $eventId;

  public function render()
  {
    return view('livewire.add-host');
  }

  public function mount($eventId) {}

  public function submit()
  {
    return redirect()->route('évènement', $this->eventId);
  }

  public function editEvent()
  {
    redirect()->route('modifier un évènement', $this->eventId);
  }
}

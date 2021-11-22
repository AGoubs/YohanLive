<?php

namespace App\Http\Livewire;

use App\Models\Event as ModelsEvent;
use App\Models\Host;
use Livewire\Component;

class Event extends Component
{

  public $events = [];

  public function render()
  {
    $this->events = ModelsEvent::orderBy('Date', 'ASC')->get();
    return view('livewire.event');
  }

  public function deleteEvent($id)
  {
    $event = ModelsEvent::find($id);
    Host::where('event_id', $id)->delete();
    $event->delete();
    return redirect()->route('events.index');
  }

  public function deleteAllEvent()
  {
    Host::query()->delete();
    ModelsEvent::query()->delete();
    return redirect()->route('events.index');
  }

  public function showEvent($eventId)
  {
    return redirect()->route('events.show', [$eventId]);
  }
}

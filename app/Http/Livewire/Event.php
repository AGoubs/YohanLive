<?php

namespace App\Http\Livewire;

use App\Models\Event as ModelsEvent;
use App\Models\EventByUser;
use App\Models\Host;
use Livewire\Component;

class Event extends Component
{

  public $events = [];

  public function render()
  {
    if (auth()->user()->isAdmin()) {
      $this->events = ModelsEvent::orderBy('Date', 'ASC')->get();
    }
    else {
      $event_by_user = EventByUser::where('user_id',auth()->id())->get();
      foreach ($event_by_user as $key => $value) {
        array_push($this->events,ModelsEvent::find($value->event_id));
      }
    }
    return view('livewire.event');
  }

  public function deleteEvent($id)
  {
    $event = ModelsEvent::find($id);
    Host::where('event_id', $id)->delete();
    $event->delete();
    return redirect()->route('events.show');
  }

  public function deleteAllEvent()
  {
    Host::query()->delete();
    ModelsEvent::query()->delete();
    return redirect()->route('events.show');
  }

  public function showEvent($eventId)
  {
    return redirect()->route('events.show', [$eventId]);
  }
}

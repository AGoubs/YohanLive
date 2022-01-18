<?php

namespace App\Http\Livewire\Components;

use App\Models\Event;
use App\Models\EventByUser;
use App\Models\Host;
use App\Models\User;
use Livewire\Component;

class EventsTable extends Component
{
  public $events = [];
  public $events_by_users = [];
  public $users = [];

  public function render()
  {
    if (auth()->user()->isAdmin()) {
      $this->events = Event::orderBy('Date', 'DESC')->get();
      $this->events_by_users = EventByUser::pluck('event_id')->toArray();
      $users_by_events = EventByUser::all();
      foreach ($users_by_events as $event) {
        if (empty($this->users[$event->event_id])) {
          $this->users[$event->event_id] = [];
        }
        array_push($this->users[$event->event_id], User::where('id', $event->user_id)->first()->name);
      }
    } else {
      $event_by_user = EventByUser::where('user_id', auth()->id())->get();
      foreach ($event_by_user as $key => $value) {
        array_push($this->events, Event::find($value->event_id));
      }
    }
    return view('livewire.components.events-table');
  }

  public function deleteEvent($id)
  {
    $event = Event::find($id);
    Host::where('event_id', $id)->delete();
    $event->delete();
    return redirect()->route('events.index');
  }

  public function deleteAllEvent()
  {
    Host::query()->delete();
    Event::query()->delete();
    return redirect()->route('events.show');
  }

  public function showEvent($eventId)
  {
    return redirect()->route('events.show', [$eventId]);
  }
}

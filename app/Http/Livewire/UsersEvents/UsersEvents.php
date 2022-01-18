<?php

namespace App\Http\Livewire\UsersEvents;

use App\Models\Event;
use App\Models\EventByUser;
use App\Models\User;
use Livewire\Component;

class UsersEvents extends Component
{
  public $user;
  public $events;
  public $eventsByUser;
  public $EventsSelected;
  public $userId;

  public function render()
  {
    $this->EventsSelected = EventByUser::where('user_id', $this->userId)->pluck('event_id');

    $this->events = Event::whereNotIn('id', $this->EventsSelected)->orderBy('Date', 'ASC')->get();
    $this->eventsByUser = Event::whereIn('id', $this->EventsSelected)->orderBy('Date', 'ASC')->get();
    return view('livewire.users-events.users-events');
  }

  public function mount()
  {
    $this->user = User::where('id', $this->userId)->first();
  }

  public function selectEvent($eventId)
  {
    EventByUser::create([
      'user_id' => $this->userId,
      'event_id' => $eventId
    ]);
    session()->flash('success', 'Modification enregistrée avec succès !');

    return redirect(request()->header('Referer'));
  }

  public function deselectEvent($eventId)
  {
    EventByUser::where('event_id', $eventId)->where('user_id', $this->userId)->delete();
    session()->flash('success', 'Modification enregistrée avec succès !');
    return redirect(request()->header('Referer'));
  }
}

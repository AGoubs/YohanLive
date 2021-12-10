<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\EventByUser;
use App\Models\Host;
use App\Models\User;
use Livewire\Component;

class ShowEvent extends Component
{
  public $event;
  public $eventId;
  public $hosts;
  public $tableField;
  public $typeEvenement;
  public $users;
  public $userEvents;

  public function render()
  {
    $this->typeEvenement = $this->event->type_event;

    $usersIds = EventByUser::where('event_id', $this->eventId)->pluck('user_id')->toArray();
    if ($usersIds) {
      foreach ($usersIds as $userId) {
        $this->users[] = User::where('id', $userId)->first();
      }
    }
    return view('livewire.show-event');
  }

  public function mount()
  {
    $this->userEvents = EventByUser::where('user_id', auth()->id())->pluck('event_id')->toArray();

    if (!isset($this->eventId)) {
      $this->event = Event::where('Date', date("Y-m-d"))->first();
      if (!isset($this->event)) {
        session()->flash('info',  "Pas d'évènement prévu aujourd'hui");
        return redirect()->route('events.index');
      } else {
        $this->eventId = $this->event->id;
      }
    }

    if (in_array($this->eventId, $this->userEvents) || auth()->user()->isAdmin()) {
      $this->event = Event::find($this->eventId);
    } else {
      session()->flash('info',  "Pas d'évènement prévu aujourd'hui");
      return redirect()->route('events.index');
    }
  }
}

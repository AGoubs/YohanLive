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
  public $users = [];
  public $hosts;
  public $tableField;
  public $typeEvenement;

  public function render()
  {
    $this->typeEvenement = $this->event->type_event;

    $usersIds = EventByUser::where('event_id', $this->eventId)->pluck('user_id')->toArray();
    foreach ($usersIds as $userId) {
      $this->users[] = User::where('id',$userId)->first();
    }
    return view('livewire.show-event');
  }

  public function mount()
  {
    if (isset($this->eventId)) {
      $this->event = Event::find($this->eventId);
    } else {
      $this->event = Event::where('Date', date("Y-m-d"))->first();
      if (!isset($this->event)) {
        session()->flash('info',  "Pas d'évènement prévu aujourd'hui");
        return redirect()->route('events.index');
      } else {
        $this->eventId = $this->event->id;
      }
    }
  }
}

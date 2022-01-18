<?php

namespace App\Http\Livewire\UsersEvents;

use App\Models\Event;
use App\Models\EventByUser;
use App\Models\User;
use Livewire\Component;

class AssignUsers extends Component
{
  public $eventId;
  public $event;
  public $users;
  public $usersIdsByEvent;

  public function render()
  {
    $this->users = User::orderBy('role', 'DESC')->orderBy('name', 'ASC')->get();
    $this->event = Event::getEventById($this->eventId);

    $this->usersIdsByEvent = User::getUsersIdsByEvent($this->eventId);

    return view('livewire.users-events.assign-users');
  }

  public function mount()
  {
  }

  public function assignUser($formData)
  {
    $userInEvent = EventByUser::where('event_id', $this->eventId)->pluck('user_id')->toArray();
    $formDataArray = array_keys($formData);
    $userStopInEvent = array_diff($userInEvent, $formDataArray);
    foreach ($userStopInEvent as $key => $userId) {
      EventByUser::deleteEventByUser($userId, $this->eventId);
    }

    foreach ($formData as $userId => $value) {
      if (!EventByUser::eventByUserExist($userId, $this->eventId)) {
        EventByUser::createEventByUser($userId, $this->eventId);
      } 
    }
    session()->flash('success', 'Modification enregistrée avec succès !');

    return redirect()->route('events.show', [$this->eventId]);
  }
}

<?php

namespace App\Http\Livewire\Components\Tables;

use App\Models\Contact as ModelsContact;
use App\Models\Event;
use Livewire\Component;

class Contact extends Component
{
  public $eventId;
  public $event;
  public $contacts;

  public function render()
  {
    $this->contacts = ModelsContact::getContactsByEvent($this->eventId);
    $this->event = Event::find($this->eventId);

    return view('livewire.components.tables.contact');
  }

  public function deleteContact($id)
  {
    ModelsContact::find($id)->delete();
    return redirect()->route('events.contact', [$this->eventId]);
  }
}

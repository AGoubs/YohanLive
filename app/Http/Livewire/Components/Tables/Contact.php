<?php

namespace App\Http\Livewire\Components\Tables;

use App\Models\Contact as ModelsContact;
use App\Models\Event;
use Livewire\Component;
use Carbon\Carbon;

class Contact extends Component
{
  public $eventId;
  public $event;
  public $date;
  public $contacts;

  public function render()
  {
    // $this->contacts = ModelsContact::getContactsByEvent($this->eventId);
    $this->event = Event::find($this->eventId);
    $this->contacts = ModelsContact::getContactsByEventAndDate($this->eventId, $this->event->Date);
    $this->date = Carbon::parse($this->event->Date)->formatLocalized('%A %d %B %Y');

    return view('livewire.components.tables.contact');
  }

  public function deleteContact($id)
  {
    ModelsContact::find($id)->delete();
    return redirect()->route('events.contact', [$this->eventId]);
  }
}

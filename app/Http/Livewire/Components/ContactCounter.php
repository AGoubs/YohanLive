<?php

namespace App\Http\Livewire\Components;

use App\Models\Contact;
use App\Models\Event;
use Livewire\Component;

class ContactCounter extends Component
{
  public $total, $day, $eventId, $date;

  protected $listeners = ['getSelectedDate'];


  public function render()
  {
    $contacts = Contact::getContactsByEvent($this->eventId);
    $contactsByDate = Contact::getContactsByEventAndDate($this->eventId, $this->date);

    $this->total = $contacts->count();

    $this->day = $contactsByDate->count();
    return view('livewire.components.contact-counter');
  }

  public function mount()
  {
    $this->event = Event::find($this->eventId);
    $this->dateBetween = Event::getBetweenDates($this->event->Date, $this->event->DateFin);

    if (in_array(date('Y-m-d'), $this->dateBetween)) {
      $this->date = date('Y-m-d');
    } else {
      $this->date = $this->dateBetween[0];
    }
  }

  public function getSelectedDate($date)
  {
    $this->date = $date;
  }
}

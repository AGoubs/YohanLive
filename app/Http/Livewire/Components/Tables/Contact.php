<?php

namespace App\Http\Livewire\Components\Tables;

use App\Models\Contact as ModelsContact;
use App\Models\Event;
use Livewire\Component;

class Contact extends Component
{
  public $eventId;
  public $event;
  public $date;
  public $dateBetween;
  public $contacts;
  public $disableDecrease = false;
  public $disableIncrease = false;

  public function render()
  {
    $this->emit('getSelectedDate', $this->date);

    if ($this->date == $this->dateBetween[0]) {
      $this->disableDecrease = true;
    } else {
      $this->disableDecrease = false;
    }

    if ($this->date == end($this->dateBetween)) {
      $this->disableIncrease = true;
    } else {
      $this->disableIncrease = false;
    }
    $this->contacts = ModelsContact::getContactsByEventAndDate($this->eventId, $this->date);

    return view('livewire.components.tables.contact');
  }

  public function increase_date()
  {
    $tempDate = date('Y-m-d', strtotime($this->date . ' + 1 days'));
    if (in_array($tempDate, $this->dateBetween)) {
      $this->date = $tempDate;
    } else {
      $this->disableIncrease = true;
    }
  }

  public function decrease_date()
  {
    $tempDate = date('Y-m-d', strtotime($this->date . ' - 1 days'));
    if (in_array($tempDate, $this->dateBetween)) {
      $this->date = $tempDate;
    }
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

  public function deleteContact($id)
  {
    ModelsContact::find($id)->delete();
    if (auth()->user()->isAdmin()) {
      return redirect()->route('events.show', [$this->eventId]);
    } else {
      return redirect()->route('events.contact', [$this->eventId]);
    }
  }
}

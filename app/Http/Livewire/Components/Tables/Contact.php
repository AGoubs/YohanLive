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
  public $dateBetween;
  public $contacts;

  public function render()
  {
    $this->contacts = ModelsContact::getContactsByEventAndDate($this->eventId, $this->date);


    $this->dateBetween = $this->getBetweenDates($this->event->Date, $this->event->DateFin);

    return view('livewire.components.tables.contact');
  }

  public function increase_date()
  {
    $this->date = date('Y-m-d', strtotime($this->date . ' + 1 days'));
  }

  public function decrease_date()
  {
    $this->date = date('Y-m-d', strtotime($this->date . ' - 1 days'));
  }

  public function mount()
  {
    $this->event = Event::find($this->eventId);
    $this->date = date('Y-m-d');
  }

  public function deleteContact($id)
  {
    ModelsContact::find($id)->delete();
    return redirect()->route('events.contact', [$this->eventId]);
  }

  /** 
   * Write code on Method
   *
   * @return response()
   */
  function getBetweenDates($startDate, $endDate)
  {
    $rangArray = [];

    $startDate = strtotime($startDate);
    $endDate = strtotime($endDate);

    for (
      $currentDate = $startDate;
      $currentDate <= $endDate;
      $currentDate += (86400)
    ) {

      $date = date('Y-m-d', $currentDate);
      $rangArray[] = $date;
    }

    return $rangArray;
  }
}

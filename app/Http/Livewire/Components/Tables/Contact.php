<?php

namespace App\Http\Livewire\Components\Tables;

use App\Exports\ContactPerDateSheetExport;
use App\Models\Contact as ModelsContact;
use App\Models\Event;
use App\Models\User;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Contact extends Component
{
  public $eventId;
  public $event;
  public $date;
  public $dateBetween;
  public $contacts;
  public $total;
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

    if (auth()->user()->isAdmin()) {
      $this->contacts = ModelsContact::getContactsByEventAndDate($this->eventId, $this->date);
      if ($this->contacts) {
        foreach ($this->contacts as $contact) {
          $contact->user_name = User::getUserNameById($contact->user_id);
        }
      }
    } else {
      $this->contacts = ModelsContact::getContactsByEventAndDateAndUser($this->eventId, $this->date, auth()->id());
      $this->total = $this->contacts->count();
    }




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

  public function scanQrCode()
  {
    dd('hello');
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

  public function ContactExport()
  {
    return Excel::download(new ContactPerDateSheetExport($this->eventId, $this->dateBetween), $this->event->Nom . " " . \Carbon\Carbon::parse($this->event->Date)->translatedFormat('Y') . '.xlsx');
  }

  public function getUserNameById($userId)
  {
    $userName = User::getUserNameById($userId);
    return $userName;
  }
}

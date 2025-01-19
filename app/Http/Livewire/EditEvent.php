<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class EditEvent extends Component
{
  public $event;
  public $Nom = '';
  public $Date = '';
  public $DateFin = '';


  protected $rules = [
    'Nom' => 'required',
    'Date' => 'required|before:DateFin',
    'DateFin' => '',
  ];

  public function render()
  {
    return view('livewire.edit-event');
  }

  public function mount($eventId)
  {
    $this->event = Event::find($eventId);
    $this->Nom = $this->event->Nom;
    $this->Date = $this->event->Date;
    $this->DateFin = $this->event->DateFin;
  }

  public function updateEvent()
  {
    $this->validate();
    $this->event->Nom = $this->Nom;
    $this->event->Date = $this->Date;
    $this->event->DateFin = $this->DateFin;
    $this->event->save();

    return redirect()->route('events.fields', ['eventId' => $this->event->id]);
  }
}

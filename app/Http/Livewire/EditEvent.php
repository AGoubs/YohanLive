<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class EditEvent extends Component
{
  public $event;
  public $Nom = '';
  public $Date = '';
  public $HeureArrive = '';
  public $HeureEvenement = '';

  protected $rules = [
    'Nom' => 'required|unique:events',
    'Date' => 'required',
    'HeureArrive' => 'required',
    'HeureEvenement' => 'required',
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
    $this->HeureEvenement = date('H:i', strtotime($this->event->HeureEvenement));
    $this->HeureArrive = date('H:i', strtotime($this->event->HeureArrive));
  }

  public function updateEvent()
  {
    $this->validate();
    $this->event->Nom = $this->Nom;
    $this->event->Date = $this->Date;
    $this->event->HeureEvenement = $this->HeureEvenement;
    $this->event->HeureArrive = $this->HeureArrive;
    $this->event->save();
    return redirect()->route('évènements');
  }
}

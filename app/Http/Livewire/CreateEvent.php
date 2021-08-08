<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class CreateEvent extends Component
{
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
    return view('livewire.create-event');
  }

  public function createEvent()
  {
    $this->validate();
    $event = Event::create([
      'Nom' => $this->Nom,
      'Date' => $this->Date,
      'HeureArrive' => $this->HeureArrive,
      'HeureEvenement' => $this->HeureEvenement,
    ]);

    return redirect()->route('ajouter des hôtes', [$event->id]);
  }
}

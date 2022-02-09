<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;

class Customization extends Component
{
  use WithFileUploads;

  public $eventId;
  public $event;
  public $Couleur;
  public $Logo;
  public $LogoSize;

  protected $rules = [
    'Couleur' => 'required',
    'Logo' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
    'LogoSize' => 'required',
  ];

  public function render()
  {

    return view('livewire.events.customization');
  }

  public function mount()
  {
    $this->event = Event::getEventById($this->eventId);
    $this->Couleur = $this->event->Couleur;
    if ($this->event->LogoSize) {
      $this->LogoSize = $this->event->LogoSize;
    } else {
      $this->LogoSize = 250;
    }
  }

  public function updateEvent()
  {
    $this->validate();
    $this->event->Logo = $this->Logo->store('logos', 'public');
    $this->event->Couleur = $this->Couleur;
    $this->event->LogoSize = $this->LogoSize;
    $this->event->save();

    return redirect()->route('assign-users.index', ['eventId' => $this->event->id]);
  }
}

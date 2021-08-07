<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class AddHost extends Component
{
  public $existingEvent;
  public $tableType = "Basique";
  public $tableField;
  public $basique = ["Nom", "Prénom", "Fonction", "Téléphone", "Commentaire"];
  public $stade = ["Nom", "Prénom", "Fonction", "Téléphone", "Numéro Ipad",  "Point", "Commentaire"];
  public $fdl = ["Nom", "Prénom", "Fonction", "Téléphone", "Lieu", "Porte", "Commentaire"];

  public function render()
  {
    return view('livewire.add-host');
  }

  public function mount($eventId)
  {
    $this->existingEvent = Event::find($eventId);
    $this->tableField = $this->basique;
  }

  public function changeTableType($type)
  {
    switch ($type) {
      case "Basique":
        $this->tableField = $this->basique;
        $this->tableType = $type;
        break;
      case "Stade":
        $this->tableField = $this->stade;
        $this->tableType = $type;
        break;
      case "FDL":
        $this->tableField = $this->fdl;
        $this->tableType = $type;
        break;
      default:
      $this->tableField = $this->basique;
    }
  }
}

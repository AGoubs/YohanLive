<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Host;
use Livewire\Component;

class AddHost extends Component
{
  public $existingEvent;
  public $tableField;
  public $importedHosts = [];
  public $tableType = "Basique";
  public $basique = ["Nom", "Prénom", "Fonction", "Téléphone", "Commentaire"];
  public $stade = ["Nom", "Prénom", "Fonction", "Téléphone", "Numéro Ipad",  "Point", "Commentaire"];
  public $fdl = ["Nom", "Prénom", "Fonction", "Téléphone", "Lieu", "Porte", "Commentaire"];
  protected $listeners = ['importedHosts'];

  protected $rules = [
    'Nom' => 'required',
    'Prenom' => 'required',
    'event_id' => 'required',
  ];

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

  public function importedHosts(array $hosts)
  {
    $this->importedHosts = $hosts[0];
  }

  public function saveImportedHosts()
  {
    foreach ($this->importedHosts as $host) {
      $host = new Host($host);
      $host->event_id = $this->existingEvent->id;
      $host->save();
    }
  }
}

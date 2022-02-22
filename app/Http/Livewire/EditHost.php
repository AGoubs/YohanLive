<?php

namespace App\Http\Livewire;

use App\Models\Host;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class EditHost extends Component
{
  public $host;
  public $text;
  public $hostId;
  public $eventId;

  protected $rules = [
    'host.id' => '',
    'host.nom' => 'required',
    'host.prenom' => 'required',
    'host.fonction' => '',
    'host.telephone' => '',
    'host.numero_ipad' => '',
    'host.lieu' => '',
    'host.point' => '',
    'host.porte' => '',
    'host.commentaire' => '',
    'host.is_arrived' => '',
  ];

  public function render()
  {
    return view('livewire.edit-host');
  }

  public function mount()
  {
    if (isset($this->hostId)) {
      $this->host = Host::find($this->hostId);
      $this->text = "Modification d'un hôte";
    } else {
      $this->host = new Host();
      $this->text = "Ajouter un hôte";
    }
  }

  public function submit()
  {
    $this->validate();
    if (!$this->host->id) {
      session()->flash('info',  "Hôte créé avec succès");
      $this->host->event_id = $this->eventId;
    } else
      session()->flash('info',  "Hôte modifié avec succès");

    $this->host->save();

    return redirect()->route('hosts.add', [$this->eventId]);
  }
}

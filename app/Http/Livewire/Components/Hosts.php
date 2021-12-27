<?php

namespace App\Http\Livewire\Components;

use App\Models\Event;
use App\Models\Host;
use App\Models\TypeEvent;
use Livewire\Component;

class Hosts extends Component
{
  public $eventId;
  public $event;
  public $hosts;
  public $tableType;
  public $tableFields;

  public function render()
  {
    $this->hosts = Host::where('event_id', $this->eventId)->select('id', 'is_arrived', 'time_arrived', 'nom', 'prenom', 'fonction', 'telephone', 'numero_ipad', 'lieu', 'point', 'porte', 'commentaire')->get();
    $this->event = Event::find($this->eventId);
    $this->tableType = TypeEvent::where('type_event', $this->event->type_event)->first();
    $this->tableFields = explode(',', $this->tableType->fields);

    return view('livewire.components.hosts');
  }

  public function deleteHost($id)
  {
    Host::find($id)->delete();
  }

  public function deleteAllHosts()
  {
    Host::where('event_id', $this->eventId)->delete();
  }

  public function changeArrived($hostId)
  {
    $host = Host::find($hostId);
    $host->is_arrived ^= 1;
    if ($host->is_arrived == 0) {
      $host->time_arrived = null;
    } else {
      $host->time_arrived = date('H:i');
    }
    $host->save();
  }
}

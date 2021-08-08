<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Host;
use Livewire\Component;

class ShowEvent extends Component
{
    public $event;
    public ?int $eventId;
    public $hosts;
    public $tableField;
    public $typeEvenement;
    public $basique = ["Arrivé ?", "Nom", "Prénom", "Fonction", "Téléphone", "Commentaire"];
    public $stade = ["Arrivé ?", "Nom", "Prénom", "Fonction", "Téléphone", "Numéro Ipad",  "Point", "Commentaire"];
    public $fdl = ["Arrivé ?", "Nom", "Prénom", "Fonction", "Téléphone", "Lieu", "Porte", "Commentaire"];

    public function render()
    {
        $this->hosts = Host::where('event_id', $this->event->id)->select('id', 'is_arrived', 'nom', 'prenom', 'fonction', 'telephone', 'numero_ipad', 'lieu', 'point', 'porte', 'commentaire')->get()->toArray();
        $this->typeEvenement = Host::where('event_id', $this->event->id)->first();
        $this->typeEvenement = $this->typeEvenement->type_evenement;

        switch ($this->typeEvenement) {
            case "Basique":
                $this->tableField = $this->basique;
                break;
            case "Stade":
                $this->tableField = $this->stade;
                break;
            case "FDL":
                $this->tableField = $this->fdl;
                break;
        }
        return view('livewire.show-event');
    }

    public function mount()
    {
        if (isset($this->eventId)) {
            $this->event = Event::find($this->eventId);
        } else {
            $this->event = Event::where('Date', date("Y-m-d"))->first();
            if (!isset($this->event)) {
                session()->flash('info',  "Pas d'évènement aujourd'hui");
                return redirect()->route('évènements');
            }
        }
    }

    public function changeArrived($hostId)
    {
        $host = Host::find($hostId);
        $host->is_arrived ^= 1;
        $host->save();
    }
}

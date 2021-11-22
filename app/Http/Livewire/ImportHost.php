<?php

namespace App\Http\Livewire;

use App\Imports\HostImport;
use App\Models\Host;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ImportHost extends Component
{
    use WithFileUploads;
    public $file;
    public $eventId;
    private $importedHost;

    public function render()
    {
        return view('livewire.import-host');
    }

    public function submit()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
        Host::where('event_id', $this->eventId)->delete();
        $this->importedHost = Excel::import(new HostImport($this->eventId, 'Basique'), $this->file);

        return redirect()->route('hosts.add', [$this->eventId]);
    }
}

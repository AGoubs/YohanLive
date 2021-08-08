<?php

namespace App\Http\Livewire;

use App\Imports\HostImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ImportHost extends Component
{
    use WithFileUploads;
    public $file;
    public $importedHost = [];

    public function render()
    {
        return view('livewire.import-host');
    }

    public function submit()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $this->importedHost = Excel::toCollection(new HostImport, $this->file);

        $this->emitUp('importedHosts', $this->importedHost);
    }
}

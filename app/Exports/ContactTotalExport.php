<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ContactTotalExport implements FromCollection, WithHeadings, ShouldAutoSize, WithTitle
{
  use Exportable;

  public function  __construct($eventId)
  {
    $this->eventId = $eventId;
  }

  public function headings(): array
  {
    return [
      'Nom',
      'Prénom',
      'Téléphone',
      'Email',
      'Commentaire',
    ];
  }

  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return Contact::where('event_id', $this->eventId)->get(['name', 'firstname', 'phone', 'email', 'comment']);
  }

  public function title(): string
  {
    return "Total";
  }
}

<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ContactExport implements FromCollection, WithHeadings, ShouldAutoSize, WithTitle
{
  use Exportable;
  protected $date;

  public function  __construct($eventId, $date)
  {
    $this->eventId = $eventId;
    $this->date = $date;
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
    return Contact::where('event_id', $this->eventId)->whereDate('created_at', $this->date)->get(['name', 'firstname', 'phone', 'email', 'comment']);
  }

  public function title(): string
  {
    return ucfirst(\Carbon\Carbon::parse($this->date)->translatedFormat('l d F Y'));
  }
}

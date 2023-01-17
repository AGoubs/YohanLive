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
      'Activité',
      'Société',
      'Nom',
      'Prénom',
      'Téléphone',
      'Email',
      'Pays',
      'Ville',
      'Adresse',
      'CP',
      'Date de rendez-vous',
      'Avec',
      'N° SIRET',
      'Commentaire',
    ];
  }

  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return Contact::where('event_id', $this->eventId)->get(['activity', 'company', 'name', 'firstname', 'phone', 'email', 'country', 'city', 'postal',  'date_appointment', 'user_appointment', 'siret', 'comment']);
  }

  public function title(): string
  {
    return "Total";
  }
}

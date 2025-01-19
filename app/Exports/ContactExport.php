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
      'Activité',
      'Fonction',
      'Nom',
      'Prénom',
      'Téléphone',
      'Email',
      // 'Pays',
      // 'Ville',
      // 'Adresse',
      // 'CP',
      // 'Date de rendez-vous',
      // 'Avec',
      // 'N° SIRET',
      'Commentaire',
      // 'Pris par',
    ];
  }

  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    // return Contact::where('event_id', $this->eventId)->whereDate('contacts.created_at', $this->date)->join('users', 'contacts.user_id', '=', 'users.id')->select('contacts.activity', 'contacts.company', 'contacts.name as contact_name', 'contacts.firstname', 'contacts.phone', 'contacts.email', 'contacts.country', 'contacts.city', 'contacts.address', 'contacts.postal',  'contacts.date_appointment', 'contacts.user_appointment', 'contacts.siret', 'contacts.comment', 'users.name')->get();
    return Contact::where('event_id', $this->eventId)->whereDate('contacts.created_at', $this->date)->join('users', 'contacts.user_id', '=', 'users.id')->select('contacts.activity', 'contacts.company', 'contacts.name as contact_name', 'contacts.firstname', 'contacts.phone', 'contacts.email', 'contacts.comment')->get();
  }

  public function title(): string
  {
    return ucfirst(\Carbon\Carbon::parse($this->date)->translatedFormat('l d F Y'));
  }
}

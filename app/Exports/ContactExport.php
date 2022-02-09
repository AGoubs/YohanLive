<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactExport implements FromCollection
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return Contact::all();
  }
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new Contact([
      'nom' => $row['name'],
      'prenom' => $row['firstname'],
      'telephone' => isset($row['phone']) ? $row['phone'] : null,
      'email' => isset($row['email']) ? $row['email'] : null,
      'comment' => isset($row['comment']) ? $row['comment'] : null,
      'model' => isset($row['model']) ? $row['model'] : null
    ]);
  }
}

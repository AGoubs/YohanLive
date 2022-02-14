<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ContactPerDateSheetExport implements WithMultipleSheets
{
  private $eventId, $dateBetween;

  public function  __construct($eventId, $dateBetween)
  {
    $this->eventId = $eventId;
    $this->dateBetween = $dateBetween;
  }

  /**
   * @return array
   */
  public function sheets(): array
  {
    $sheets = [];

    foreach ($this->dateBetween as $date) {
      $sheets[] = new ContactExport($this->eventId, $date);
    }
    $sheets[] = new ContactTotalExport($this->eventId);


    return $sheets;
  }
}

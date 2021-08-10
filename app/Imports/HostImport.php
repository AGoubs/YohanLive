<?php

namespace App\Imports;

use App\Models\Host;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HostImport implements ToModel, WithHeadingRow
{
    public function  __construct($eventId, $typeEvenement)
    {
        $this->eventId= $eventId;
        $this->typeEvenement= $typeEvenement;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Host([
            'nom' => $row['nom'],
            'prenom' => $row['prenom'],
            'fonction' => isset($row['fonction']) ? $row['fonction'] : null,
            'telephone' => isset($row['telephone']) ? $row['telephone'] : null,
            'numero_ipad' => isset($row['numero_ipad']) ? $row['numero_ipad'] : null,
            'lieu' => isset($row['lieu']) ? $row['lieu'] : null,
            'point' => isset($row['point']) ? $row['point'] : null,
            'porte' => isset($row['porte']) ? $row['porte'] : null,
            'commentaire' => isset($row['commentaire']) ? $row['commentaire'] : null,
            'event_id' => $this->eventId,
        ]);
    }
}
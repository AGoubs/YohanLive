<?php

namespace App\Imports;

use App\Models\Host;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HostImport implements ToModel, WithHeadingRow
{
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
            'fonction' => $row['fonction'],
            'telephone' => $row['telephone'],
            'numero_ipad' => $row['numero_ipad'],
            'lieu' => $row['lieu'],
            'point' => $row['point'],
            'porte' => $row['porte'],
            'commentaire' => $row['commentaire'],
        ]);
    }
}
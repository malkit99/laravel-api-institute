<?php

namespace App\Imports\Country;

use App\State;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StateImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new State([
            'state_name' => $row['state_name'],
            'country_id' => $row['country_id'],
        ]);
    }
}

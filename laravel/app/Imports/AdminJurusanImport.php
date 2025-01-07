<?php

namespace App\Imports;

use App\AdminJurusan;
use Maatwebsite\Excel\Concerns\ToModel;

class AdminJurusanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AdminJurusan([
            'nama' => $row[0]
        ]);
    }
}

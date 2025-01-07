<?php

namespace App\Imports;

use App\MataKuliah;
use Maatwebsite\Excel\Concerns\ToModel;

class MataKuliahImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MataKuliah([
           'nama_mk' => $row[0]
        ]);
    }
}

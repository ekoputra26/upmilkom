<?php

namespace App\Exports;

use App\Responden;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProdiExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $respondens = Responden::all();
        $saranProdi = new Collection;
        $respondent_number = -1;
        $nim = '-';
        $nama_mk = '-';
        $prodi = '-';

        foreach ($respondens as $responden) {
            if ($responden->attribute === 'program_studi') {
                $respondent_number = $responden->respondent_number;
                $prodi = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'nim') {
                $nim = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'nama_mk') {
                $nama_mk = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'saranProgramStudi') {
                $saranProdi->push([
                    'nim' => $nim,
                    'nama_mk' => $nama_mk,
                    'prodi' => $prodi,
                    'saranProdi' => $responden->value
                ]);
                $nim = '-';
                $nama_mk = '-';
                $prodi = '-';
            }
        }

        return view('excel.saran_prodi', [
            'saranProdi' => $saranProdi
        ]);
    }
}

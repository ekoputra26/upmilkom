<?php

namespace App\Exports;

use App\Responden;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TKExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $respondens = Responden::all();
        $saranTK = new Collection;
        $respondent_number = -1;
        $nim = '-';
        $nama_mk = '-';
        $namaAdmin = '-';

        foreach ($respondens as $responden) {
            if ($responden->attribute === 'nim') {
                $respondent_number = $responden->respondent_number;
                $nim = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'nama_mk') {
                $nama_mk = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'namaAdmin') {
                $namaAdmin = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'saranTenagaKependidikan') {
                $saranTK->push([
                    'nim' => $nim,
                    'nama_mk' => $nama_mk,
                    'namaAdmin' => $namaAdmin,
                    'saranTK' => $responden->value
                ]);
                $nim = '-';
                $nama_mk = '-';
                $namaAdmin = '-';
            }
        }

        return view('excel.saran_tk', [
            'saranTK' => $saranTK
        ]);
    }
}

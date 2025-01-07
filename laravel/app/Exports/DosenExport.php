<?php

namespace App\Exports;

use App\Responden;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DosenExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $respondens = Responden::all();
        $saranDosen = new Collection;
        $respondent_number = -1;
        $nim = '-';
        $nama_mk = '-';
        $dosen1 = '-';
        $dosen2 = '-';

        foreach ($respondens as $responden) {
            if ($responden->attribute === 'nim') {
                $respondent_number = $responden->respondent_number;
                $nim = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'nama_mk') {
                $nama_mk = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'dosen1') {
                $dosen1 = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'dosen2') {
                $dosen2 = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'saranDosen') {
                $saranDosen->push([
                    'nim' => $nim,
                    'nama_mk' => $nama_mk,
                    'dosen1' => $dosen1,
                    'dosen2' => $dosen2,
                    'saranDosen' => $responden->value
                ]);
                $nim = '-';
                $nama_mk = '-';
                $dosen1 = '-';
                $dosen2 = '-';
            }
        }

        return view('excel.saran_dosen', [
            'saranDosen' => $saranDosen
        ]);
    }
}

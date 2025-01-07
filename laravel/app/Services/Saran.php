<?php

namespace App\Services;

use App\Responden;
use Illuminate\Database\Eloquent\Collection;

class Saran
{
    public function getSaranDosen()
    {
        $respondens = Responden::all();
        $saranDosen = new Collection;
        $respondent_number = -1;
        $dosen1 = '-';
        $dosen2 = '-';

        foreach ($respondens as $responden) {
            if ($responden->attribute === 'dosen1') {
                $respondent_number = $responden->respondent_number;
                $dosen1 = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'dosen2') {
                $dosen2 = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'saranDosen') {
                $saranDosen->push([
                    'dosen1' => $dosen1,
                    'dosen2' => $dosen2,
                    'saranDosen' => $responden->value,
                    'respondent_number' => $respondent_number,
                ]);
            }
        }

        return $saranDosen;
    }

    public function getSaranTenagaKependidikan()
    {
        $respondens = Responden::all();
        $saranTK = new Collection;
        $respondent_number = -1;
        $namaAdmin = '-';

        foreach ($respondens as $responden) {
            if ($responden->attribute === 'namaAdmin') {
                $respondent_number = $responden->respondent_number;
                $namaAdmin = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'saranTenagaKependidikan') {
                $saranTK->push([
                    'namaAdmin' => $namaAdmin,
                    'saranTenagaKependidikan' => $responden->value,
                    'respondent_number' => $respondent_number,
                ]);
            }
        }

        return $saranTK;
    }

    public function getSaranProgramStudi()
    {
        $respondens = Responden::all();
        $saranProdi = new Collection;
        $respondent_number = -1;
        $program_studi = '-';

        foreach ($respondens as $responden) {
            if ($responden->attribute === 'program_studi') {
                $respondent_number = $responden->respondent_number;
                $program_studi = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'saranProgramStudi') {
                $saranProdi->push([
                    'program_studi' => $program_studi,
                    'saranProgramStudi' => $responden->value,
                    'respondent_number' => $respondent_number,
                ]);
            }
        }

        return $saranProdi;
    }
}

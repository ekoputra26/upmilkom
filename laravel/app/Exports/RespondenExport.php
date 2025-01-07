<?php

namespace App\Exports;

use App\Instrumen;
use App\Responden;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RespondenExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $respondens = Responden::all();
        $respondenn = new Collection;
        $instrumen1 = Instrumen::all()->where('bagian', 1);
        $instrumen2 = Instrumen::all()->where('bagian', 2);
        $instrumen3 = Instrumen::all()->where('bagian', 3);
        $instrumen4 = Instrumen::all()->where('bagian', 4);
        $instrumen5 = Instrumen::all()->where('bagian', 5);
        $respondent_number = -1;
        $program_studi = '-';
        $semester = '-';
        $nim = '-';
        $tanggal = '-';
        $kelas = '-';
        $hari = '-';
        $nama_mk = '-';
        $jenis_mk = '-';
        $dosen1 = '-';
        $dosen2 = '-';
        $ruangan = '-';
        $namaAdmin = '-';
        $saranDosen = '-';
        $saranTenagaKependidikan = '-';
        $saranProgramStudi = '-';
        $b1 = [];
        $b2 = [];
        $b3 = [];
        $b4 = [];
        $b5 = [];

        foreach ($respondens as $responden) {
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'semester') {
                $semester = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'nim') {
                $nim = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'tanggal') {
                $tanggal = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'kelas') {
                $kelas = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'hari') {
                $hari = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'nama_mk') {
                $nama_mk = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'jenis_mk') {
                $jenis_mk = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'dosen1') {
                $dosen1 = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'dosen2') {
                $dosen2 = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'ruangan') {
                $ruangan = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'namaAdmin') {
                $namaAdmin = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'saranDosen') {
                $saranDosen = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'saranTenagaKependidikan') {
                $saranTenagaKependidikan = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'saranProgramStudi') {
                $saranProgramStudi = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number) {
                for ($i = 1; $i <= count($instrumen1); $i++) {
                    if ($responden->attribute === ('b1' . ($i))) {
                        $b1[$i - 1] =  $responden->value;
                    }
                }
                for ($i = 1; $i <= count($instrumen2); $i++) {
                    if ($responden->attribute === ('b2' . ($i))) {
                        $b2[$i - 1] =  $responden->value;
                    }
                }
                for ($i = 1; $i <= count($instrumen3); $i++) {
                    if ($responden->attribute === ('b3' . ($i))) {
                        $b3[$i - 1] =  $responden->value;
                    }
                }
                for ($i = 1; $i <= count($instrumen4); $i++) {
                    if ($responden->attribute === ('b4' . ($i))) {
                        $b4[$i - 1] =  $responden->value;
                    }
                }
                for ($i = 1; $i <= count($instrumen5); $i++) {
                    if ($responden->attribute === ('b5' . ($i))) {
                        $b5[$i - 1] =  $responden->value;
                    }
                }
            }
            if ($responden->attribute === 'program_studi') {
                if ($respondent_number == -1) {
                    $respondent_number = $responden->respondent_number;
                    $program_studi = $responden->value;
                } else {
                    $respondenn->push([
                        'program_studi' => $program_studi,
                        'semester' => $semester,
                        'nim' => $nim,
                        'tanggal' => $tanggal,
                        'kelas' => $kelas,
                        'hari' => $hari,
                        'nama_mk' => $nama_mk,
                        'jenis_mk' => $jenis_mk,
                        'dosen1' => $dosen1,
                        'dosen2' => $dosen2,
                        'ruangan' => $ruangan,
                        'b1' => $b1,
                        'b2' => $b2,
                        'b3' => $b3,
                        'namaAdmin' => $namaAdmin,
                        'b4' => $b4,
                        'b5' => $b5,
                        'saranDosen' => $saranDosen,
                        'saranTenagaKependidikan' => $saranTenagaKependidikan,
                        'saranProgramStudi' => $saranProgramStudi,
                    ]);
                    $program_studi = '-';
                    $semester = '-';
                    $nim = '-';
                    $tanggal = '-';
                    $kelas = '-';
                    $hari = '-';
                    $nama_mk = '-';
                    $jenis_mk = '-';
                    $dosen1 = '-';
                    $dosen2 = '-';
                    $ruangan = '-';
                    $namaAdmin = '-';
                    $saranDosen = '-';
                    $saranTenagaKependidikan = '-';
                    $saranProgramStudi = '-';
                    $b1 = [];
                    $b2 = [];
                    $b3 = [];
                    $b4 = [];
                    $b5 = [];

                    $respondent_number = $responden->respondent_number;
                    $program_studi = $responden->value;
                }
            }
        }

        //coba reintialize variable each finish loop
        return view('excel.responden', [
            'responden' => $respondenn
        ]);
    }
}

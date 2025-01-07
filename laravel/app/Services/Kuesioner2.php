<?php

namespace App\Services;

use App\Instrumen;
use App\ProgramStudi;
use App\Responden;
use Illuminate\Database\Eloquent\Collection;

class Kuesioner2
{
    public function getHasilProdi()
    {
        $hasilProdi = [];
        $prodis = ProgramStudi::all()->pluck('nama')->unique()->values()->toArray();
        $instrumen2 = Instrumen::all()->where('bagian', 2);
        $respondens = Responden::all();

        for ($i = 0; $i < count($prodis); $i++) {
            $hasilProdi[$i] = [
                'program_studi' => $prodis[$i],
                'pertemuan' => array()
            ];
            for ($j = 1; $j <= count($instrumen2); $j++) {
                $hasilProdi[$i]['pertemuan'][$j] = 0.0;
            }

            $respondent_number = -1;
            $jumlahResponden = 0;
            foreach ($respondens as $responden) {
                if ($responden->attribute === 'program_studi' && $responden->value === $prodis[$i]) {
                    $respondent_number = $responden->respondent_number;
                    $jumlahResponden = $jumlahResponden + 1;
                }
                if ($responden->respondent_number === $respondent_number) {
                    for ($j = 1; $j <= count($instrumen2); $j++) {
                        if ($responden->attribute === ('b2' . ($j))) {
                            $hasilProdi[$i]['pertemuan'][$j] = $hasilProdi[$i]['pertemuan'][$j] + $responden->value;
                        }
                    }
                }
            }

            if ($jumlahResponden != 0) {
                for ($j = 1; $j <= count($instrumen2); $j++) {
                    $hasilProdi[$i]['pertemuan'][$j] = number_format(($hasilProdi[$i]['pertemuan'][$j] / $jumlahResponden), 2, '.', ',');
                }
            }
        }
        $hasilProdi = collect($hasilProdi);

        return $hasilProdi;
    }
    
    public function getHasilMK(){
        $respondens = Responden::all();
        $instrumen2 = Instrumen::all()->where('bagian', 2);
        $hasilMK = new Collection;
        $respondent_number = -1;
        $program_studi = '-';
        $dosen1 = '-';
        $dosen2 = '-';
        $nama_mk = '-';
        $pertemuan = [];

        foreach ($respondens as $responden) {
            if ($responden->attribute === 'program_studi') {
                $respondent_number = $responden->respondent_number;
                $program_studi = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'dosen1') {
                $dosen1 = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'dosen2') {
                $dosen2 = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'nama_mk') {
                $nama_mk = $responden->value;
            }
            for ($i = 1; $i <= count($instrumen2); $i++) {
                if ($responden->attribute === ('b2' . $i) && $responden->respondent_number === $respondent_number) {
                    $pertemuan[($i - 1)] = $responden->value;
                }
            }
            if ($responden->attribute === ('b2' . count($instrumen2)) && $responden->respondent_number === $respondent_number) {
                $cek = $hasilMK->filter(function ($item, $key) use ($program_studi, $nama_mk, $dosen1, $dosen2) {
                    return $item['program_studi'] === $program_studi && $item['nama_mk'] === $nama_mk && ($item['dosen1'] === $dosen1 || $item['dosen2'] == $dosen1) && ($item['dosen1'] === $dosen2 || $item['dosen2'] == $dosen2);
                });
                if ($cek->count() != 0) {
                    $hasilMK->transform(function ($item, $key) use ($program_studi, $nama_mk, $dosen1, $dosen2, $pertemuan) {
                        if ($item['program_studi'] === $program_studi && $item['nama_mk'] === $nama_mk && ($item['dosen1'] === $dosen1 || $item['dosen2'] == $dosen1) && ($item['dosen1'] === $dosen2 || $item['dosen2'] == $dosen2)) {
                            for ($i = 0; $i < count($item['pertemuan']); $i++) {
                                $item['pertemuan'][$i] = $item['pertemuan'][$i] + $pertemuan[$i];
                            }
                            $item['jumlahResponden'] = $item['jumlahResponden'] + 1;
                            return $item;
                        } else {
                            return $item;
                        }
                    });
                } else {
                    $hasilMK->push([
                        'program_studi' => $program_studi,
                        'dosen1' => $dosen1,
                        'dosen2' => $dosen2,
                        'nama_mk' => $nama_mk,
                        'pertemuan' => $pertemuan,
                        'jumlahResponden' => 1
                    ]);
                }
            }
        }

        $hasilMK->transform(function ($item, $key) use ($instrumen2) {
            for ($i = 0; $i < count($instrumen2); $i++) {
                $item['pertemuan'][$i] = $item['pertemuan'][$i] / $item['jumlahResponden'];
            }
            return $item;
        });

        return $hasilMK;
    }
}
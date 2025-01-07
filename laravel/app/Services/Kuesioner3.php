<?php

namespace App\Services;

use App\Instrumen;
use App\ProgramStudi;
use App\Responden;
use Illuminate\Database\Eloquent\Collection;

class Kuesioner3
{
    public function getHasilProdi()
    {
        $hasilProdi = [];
        $prodis = ProgramStudi::all()->pluck('nama')->unique()->values()->toArray();
        $instrumen3 = Instrumen::all()->where('bagian', 3);
        $respondens = Responden::all();

        for ($i = 0; $i < count($prodis); $i++) {
            $hasilProdi[$i] = [
                'program_studi' => $prodis[$i],
                'nilai' => array()
            ];
            for ($j = 1; $j <= count($instrumen3); $j++) {
                $hasilProdi[$i]['nilai'][$j] = 0.0;
            }

            $respondent_number = -1;
            $jumlahResponden = 0;
            foreach ($respondens as $responden) {
                if ($responden->attribute === 'program_studi' && $responden->value === $prodis[$i]) {
                    $respondent_number = $responden->respondent_number;
                    $jumlahResponden = $jumlahResponden + 1;
                }
                if ($responden->respondent_number === $respondent_number) {
                    for ($j = 1; $j <= count($instrumen3); $j++) {
                        if ($responden->attribute === ('b3' . ($j))) {
                            $hasilProdi[$i]['nilai'][$j] = $hasilProdi[$i]['nilai'][$j] + $responden->value;
                        }
                    }
                }
            }

            if ($jumlahResponden != 0) {
                for ($j = 1; $j <= count($instrumen3); $j++) {
                    $hasilProdi[$i]['nilai'][$j] = number_format(($hasilProdi[$i]['nilai'][$j] / $jumlahResponden), 2, '.', ',');
                }
            }
        }
        $hasilProdi = collect($hasilProdi);

        return $hasilProdi;
    }

    public function getHasilDosen()
    {
        $respondens = Responden::all();
        $instrumen3 = Instrumen::all()->where('bagian', 3);
        $hasilDosen = new Collection;
        $respondent_number = -1;
        $program_studi = '-';
        $dosen1 = '-';
        $dosen2 = '-';
        $nama_mk = '-';
        $nilai = [];

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
            for ($i = 1; $i <= count($instrumen3); $i++) {
                if ($responden->attribute === ('b3' . $i) && $responden->respondent_number === $respondent_number) {
                    $nilai[($i - 1)] = $responden->value;
                }
            }
            if ($responden->attribute === ('b3' . count($instrumen3)) && $responden->respondent_number === $respondent_number) {
                $cek = $hasilDosen->filter(function ($item, $key) use ($program_studi, $nama_mk, $dosen1, $dosen2) {
                    return $item['program_studi'] === $program_studi && $item['nama_mk'] === $nama_mk && ($item['dosen1'] === $dosen1 || $item['dosen2'] == $dosen1) && ($item['dosen1'] === $dosen2 || $item['dosen2'] == $dosen2);
                });
                if ($cek->count() != 0) {
                    $hasilDosen->transform(function ($item, $key) use ($program_studi, $nama_mk, $dosen1, $dosen2, $nilai) {
                        if ($item['program_studi'] === $program_studi && $item['nama_mk'] === $nama_mk && ($item['dosen1'] === $dosen1 || $item['dosen2'] == $dosen1) && ($item['dosen1'] === $dosen2 || $item['dosen2'] == $dosen2)) {
                            for ($i = 0; $i < count($item['nilai']); $i++) {
                                $item['nilai'][$i] = $item['nilai'][$i] + $nilai[$i];
                            }
                            $item['jumlahResponden'] = $item['jumlahResponden'] + 1;
                            return $item;
                        } else {
                            return $item;
                        }
                    });
                } else {
                    $hasilDosen->push([
                        'program_studi' => $program_studi,
                        'dosen1' => $dosen1,
                        'dosen2' => $dosen2,
                        'nama_mk' => $nama_mk,
                        'nilai' => $nilai,
                        'rataNilai' => 0,
                        'jumlahResponden' => 1
                    ]);
                }
            }
        }

        $hasilDosen->transform(function ($item, $key) use ($instrumen3) {
            for ($i = 0; $i < count($instrumen3); $i++) {
                $item['nilai'][$i] = $item['nilai'][$i] / $item['jumlahResponden'];
                $item['rataNilai'] = $item['rataNilai'] + $item['nilai'][$i];
            }
            $item['rataNilai'] = $item['rataNilai'] / count($instrumen3);
            return $item;
        });

        return $hasilDosen;
    }
}

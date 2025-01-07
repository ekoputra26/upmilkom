<?php

namespace App\Services;

use App\Instrumen;
use App\ProgramStudi;
use App\Responden;
use Illuminate\Database\Eloquent\Collection;

class Kuesioner4
{
    public function getHasilProdi()
    {
        $hasilProdi = [];
        $prodis = ProgramStudi::all()->pluck('nama')->unique()->values()->toArray();
        $instrumen4 = Instrumen::all()->where('bagian', 4);
        $respondens = Responden::all();

        for ($i = 0; $i < count($prodis); $i++) {
            $hasilProdi[$i] = [
                'program_studi' => $prodis[$i],
                'nilai' => array()
            ];
            for ($j = 1; $j <= count($instrumen4); $j++) {
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
                    for ($j = 1; $j <= count($instrumen4); $j++) {
                        if ($responden->attribute === ('b4' . ($j))) {
                            $hasilProdi[$i]['nilai'][$j] = $hasilProdi[$i]['nilai'][$j] + $responden->value;
                        }
                    }
                }
            }

            if ($jumlahResponden != 0) {
                for ($j = 1; $j <= count($instrumen4); $j++) {
                    $hasilProdi[$i]['nilai'][$j] = number_format(($hasilProdi[$i]['nilai'][$j] / $jumlahResponden), 2, '.', ',');
                }
            }
        }
        $hasilProdi = collect($hasilProdi);

        return $hasilProdi;
    }

    public function getHasilAdmin()
    {
        $respondens = Responden::all();
        $instrumen4 = Instrumen::all()->where('bagian', 4);
        $hasilAdmin = new Collection;
        $respondent_number = -1;
        $program_studi = '-';
        $kelas = '-';
        $kodeKelas = '-';
        $namaAdmin = '-';
        $nilai = [];

        foreach ($respondens as $responden) {
            if ($responden->attribute === 'program_studi') {
                $respondent_number = $responden->respondent_number;
                $program_studi = $responden->value;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'kelas') {
                $kelas = $responden->value;
                $kodeKelas = ProgramStudi::where('nama', $program_studi)->where('kelas', $kelas)->first()->kode;
            }
            if ($responden->respondent_number === $respondent_number && $responden->attribute === 'namaAdmin') {
                $namaAdmin = $responden->value;
            }
            for ($i = 1; $i <= count($instrumen4); $i++) {
                if ($responden->attribute === ('b4' . $i) && $responden->respondent_number === $respondent_number) {
                    $nilai[($i - 1)] = $responden->value;
                }
            }
            if ($responden->attribute === ('b4' . count($instrumen4)) && $responden->respondent_number === $respondent_number) {
                $cek = $hasilAdmin->filter(function ($item, $key) use ($kodeKelas, $namaAdmin) {
                    return $item['kodeKelas'] === $kodeKelas && $item['namaAdmin'] === $namaAdmin;
                });
                if ($cek->count() != 0) {
                    $hasilAdmin->transform(function ($item, $key) use ($kodeKelas, $namaAdmin, $nilai) {
                        if ($item['kodeKelas'] === $kodeKelas && $item['namaAdmin'] === $namaAdmin) {
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
                    $hasilAdmin->push([
                        'kodeKelas' => $kodeKelas,
                        'namaAdmin' => $namaAdmin,
                        'nilai' => $nilai,
                        'rataNilai' => 0,
                        'jumlahResponden' => 1
                    ]);
                }
            }
        }

        $hasilAdmin->transform(function ($item, $key) use ($instrumen4){
            for($i=0; $i<count($instrumen4); $i++){
                $item['nilai'][$i] = $item['nilai'][$i] / $item['jumlahResponden'];
                $item['rataNilai'] = $item['rataNilai'] + $item['nilai'][$i];
            }
            $item['rataNilai'] = $item['rataNilai'] / count($instrumen4);
            return $item;
        });
        
        return $hasilAdmin;
    }
}

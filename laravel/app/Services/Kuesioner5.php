<?php

namespace App\Services;

use App\Instrumen;
use App\Responden;
use Illuminate\Database\Eloquent\Collection;

class Kuesioner5
{
    public function getHasilFasilkom()
    {
        $instrumen5 = Instrumen::all()->where('bagian', 5);
        $respondens = Responden::all();
        $hasilFasilkom = [];
        for ($i = 0; $i < count($instrumen5); $i++) {
            $hasilFasilkom[$i] = 0.0;
        }
        $jumlahResponden = 0;

        foreach ($respondens as $responden) {
            if ($responden->attribute === ('b51')) {
                $jumlahResponden = $jumlahResponden + 1;
            }
            for ($i = 1; $i <= count($instrumen5); $i++) {
                if ($responden->attribute === ('b5' . ($i))) {
                    $hasilFasilkom[$i - 1] = $hasilFasilkom[$i - 1] + $responden->value;
                }
            }
        }

        for ($i = 0; $i < count($hasilFasilkom); $i++) {
            if ($jumlahResponden != 0) {
                $hasilFasilkom[$i] = number_format($hasilFasilkom[$i] / $jumlahResponden, 2, '.', ',');
            }
        }

        return ($hasilFasilkom);
    }

    public function getHasilRuangan()
    {
        $respondens = Responden::all();
        $instrumen5 = Instrumen::all()->where('bagian', 5);
        $hasilRuangan = new Collection;
        $respondent_number = -1;
        $ruangan = '-';
        $nilai = [];

        foreach ($respondens as $responden) {
            if ($responden->attribute === 'ruangan') {
                $respondent_number = $responden->respondent_number;
                $ruangan = $responden->value;
            }
            for ($i = 1; $i <= count($instrumen5); $i++) {
                if ($responden->attribute === ('b5' . $i) && $responden->respondent_number === $respondent_number) {
                    $nilai[($i - 1)] = $responden->value;
                }
            }
            if ($responden->attribute === ('b5' . count($instrumen5)) && $responden->respondent_number === $respondent_number) {
                $cek = $hasilRuangan->filter(function ($item, $key) use ($ruangan) {
                    return $item['ruangan'] === $ruangan;
                });
                if ($cek->count() != 0) {
                    $hasilRuangan->transform(function ($item, $key) use ($ruangan, $nilai) {
                        if ($item['ruangan'] === $ruangan) {
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
                    $hasilRuangan->push([
                        'ruangan' => $ruangan,
                        'nilai' => $nilai,
                        'rataNilai' => 0,
                        'jumlahResponden' => 1
                    ]);
                }
            }
        }

        $hasilRuangan->transform(function ($item, $key) use ($instrumen5){
            for($i=0; $i<count($instrumen5); $i++){
                $item['nilai'][$i] = $item['nilai'][$i] / $item['jumlahResponden'];
                $item['rataNilai'] = $item['rataNilai'] + $item['nilai'][$i];
            }
            $item['rataNilai'] = number_format($item['rataNilai'] / count($instrumen5), 2, '.', ',');
            return $item;
        });
        
        return $hasilRuangan;
    }
}

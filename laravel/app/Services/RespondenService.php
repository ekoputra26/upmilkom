<?php

namespace App\Services;

use App\DataLain;
use App\Instrumen;
use App\ProgramStudi;
use App\Responden;

class RespondenService
{
    public function createResponden($data)
    {
        $nomorResponden = (int)DataLain::where('attribute', 'jumlah_responden')->first()->value + 1;
        $jumlahInstrumen1 = Instrumen::where('bagian', 1)->count();
        $jumlahInstrumen2 = Instrumen::where('bagian', 2)->count();
        $jumlahInstrumen3 = Instrumen::where('bagian', 3)->count();
        $jumlahInstrumen4 = Instrumen::where('bagian', 4)->count();
        $jumlahInstrumen5 = Instrumen::where('bagian', 5)->count();

        Responden::insert([
            ['respondent_number' => $nomorResponden, 'attribute' => 'program_studi', 'value' => $data->programStudiInput],
            ['respondent_number' => $nomorResponden, 'attribute' => 'semester', 'value' => $data->semesterInput],
            ['respondent_number' => $nomorResponden, 'attribute' => 'nim', 'value' => $data->nimInput],
            ['respondent_number' => $nomorResponden, 'attribute' => 'tanggal', 'value' => $data->tanggalInput],
            ['respondent_number' => $nomorResponden, 'attribute' => 'kelas', 'value' => $data->kelasInput],
            ['respondent_number' => $nomorResponden, 'attribute' => 'hari', 'value' => $data->hariInput],
            ['respondent_number' => $nomorResponden, 'attribute' => 'nama_mk', 'value' => $data->namaMKInput],
            ['respondent_number' => $nomorResponden, 'attribute' => 'jenis_mk', 'value' => $data->jenisMKInput],
            ['respondent_number' => $nomorResponden, 'attribute' => 'dosen1', 'value' => $data->dosenInput1],
            ['respondent_number' => $nomorResponden, 'attribute' => 'dosen2', 'value' => $data->dosenInput2],
            ['respondent_number' => $nomorResponden, 'attribute' => 'ruangan', 'value' => $data->ruanganInput],
        ]);

        DataLain::where('attribute', 'jumlah_responden')->update(['value' => $nomorResponden]);

        for ($i = 1; $i <= $jumlahInstrumen1; $i++) {
            $name = 'b1' . $i;
            Responden::create([
                'respondent_number' => $nomorResponden,
                'attribute' => 'b1' . $i,
                'value' => $data->$name
            ]);
        }

        for ($i = 1; $i <= $jumlahInstrumen2; $i++) {
            $name = 'b2' . $i;
            Responden::create([
                'respondent_number' => $nomorResponden,
                'attribute' => 'b2' . $i,
                'value' => $data->$name
            ]);
        }

        for ($i = 1; $i <= $jumlahInstrumen3; $i++) {
            $name = 'b3' . $i;
            Responden::create([
                'respondent_number' => $nomorResponden,
                'attribute' => 'b3' . $i,
                'value' => $data->$name
            ]);
        }

        Responden::create([
            'respondent_number' => $nomorResponden,
            'attribute' => 'namaAdmin',
            'value' => $data->namaAdminInput
        ]);

        for ($i = 1; $i <= $jumlahInstrumen4; $i++) {
            $name = 'b4' . $i;
            Responden::create([
                'respondent_number' => $nomorResponden,
                'attribute' => 'b4' . $i,
                'value' => $data->$name
            ]);
        }

        for ($i = 1; $i <= $jumlahInstrumen5; $i++) {
            $name = 'b5' . $i;
            Responden::create([
                'respondent_number' => $nomorResponden,
                'attribute' => 'b5' . $i,
                'value' => $data->$name
            ]);
        }

        Responden::create([
            'respondent_number' => $nomorResponden,
            'attribute' => 'saranDosen',
            'value' => $data->saranDosenInput
        ]);

        Responden::create([
            'respondent_number' => $nomorResponden,
            'attribute' => 'saranTenagaKependidikan',
            'value' => $data->saranTKInput
        ]);

        Responden::create([
            'respondent_number' => $nomorResponden,
            'attribute' => 'saranProgramStudi',
            'value' => $data->saranProdiInput
        ]);
    }

    public function getTotalJumlahResponden(): int
    {
        return DataLain::find(1)->first()->value;
    }

    public function getJumlahResponden()
    {
        $jumlahResponden = [];
        $programStudis = ProgramStudi::all()->pluck('nama')->unique()->values()->toArray();
        $respondens = Responden::all()->where('attribute', 'program_studi')->pluck('value');

        for ($i = 0; $i < count($programStudis); $i++) {
            $jumlahResponden[$i] = array($programStudis[$i], 0);
            foreach ($respondens as $responden) {
                if ($responden === $programStudis[$i]) {
                    $jumlahResponden[$i][1] = $jumlahResponden[$i][1] + 1;
                }
            }
        }

        return collect($jumlahResponden);
    }
}

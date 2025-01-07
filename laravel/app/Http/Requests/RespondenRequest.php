<?php

namespace App\Http\Requests;

use App\AdminJurusan;
use App\Dosen;
use App\JenisMataKuliah;
use App\MataKuliah;
use App\ProgramStudi;
use App\Ruangan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RespondenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $programStudis = ProgramStudi::all()->pluck('nama')->unique()->values()->toArray();
        $semester = [];
        for ($i = 0; $i < 14; $i++) {
            $semester[$i] = $i + 1;
        }
        $kelas = ProgramStudi::all()->pluck('kelas')->unique()->values()->toArray();
        $mataKuliahs = MataKuliah::all()->pluck('nama_mk')->unique()->values()->toArray();
        $jenisMataKuliahs = JenisMataKuliah::all()->pluck('jenis')->unique()->values()->toArray();
        $dosens = Dosen::all()->pluck('nama')->unique()->values()->toArray();
        $ruangans = Ruangan::all()->pluck('nama')->unique()->values()->toArray();
        $admins = AdminJurusan::all()->pluck('nama')->unique()->values()->toArray();
        array_push($dosens, '-');
        $pertemuan = [];
        for ($i = 0; $i < 17; $i++) {
            $pertemuan[$i] = $i;
        }

        return [
            'programStudiInput' => [Rule::in($programStudis)],
            'semesterInput' => [Rule::in($semester)],
            'nimInput' => 'required',
            'kelasInput' => [Rule::in($kelas)],
            'hariInput' => [Rule::in(['senin', 'selasa', 'rabu', 'kamis', 'jumat'])],
            'namaMKInput' => [Rule::in($mataKuliahs)],
            'jenisMKInput' => [Rule::in($jenisMataKuliahs)],
            'dosenInput1' => [Rule::in($dosens)],
            'dosenInput2' => [Rule::in($dosens)],
            'ruanganInput' => [Rule::in($ruangans)],
            'saranDosenInput' => 'required',
            'saranTKInput' => 'required',
            'saranProdiInput' => 'required',
            'b11' => 'required',
            'b12' => 'required',
            'b13' => 'required',
            'b14' => 'required',
            'b15' => 'required',
            'b16' => 'required',
            'b17' => 'required',
            'b18' => 'required',
            'b21' => [Rule::in($pertemuan)],
            'b22' => [Rule::in($pertemuan)],
            'b23' => [Rule::in($pertemuan)],
            'b31' => 'required',
            'b32' => 'required',
            'b33' => 'required',
            'b34' => 'required',
            'b41' => 'required',
            'b42' => 'required',
            'b43' => 'required',
            'b51' => 'required',
            'b52' => 'required',
            'b53' => 'required',
            'b54' => 'required',
            'namaAdminInput' => [Rule::in($admins)],
        ];
    }

    public function messages()
    {
        return [
            'programStudiInput.in' => 'Pilih Program Studi dari pilihan yang tersedia.',
            'semesterInput.in' => 'Pilih Semester dari pilihan yang tersedia.',
            'nimInput.required' => 'Kolom NIM harus diisi.',
            'kelasInput.in' => 'Pilih Kelas dari pilihan yang tersedia.',
            'hariInput.in' => 'Pilih Hari dari pilihan yang tersedia.',
            'namaMKInput.in' => 'Pilih Mata Kuliah dari pilihan yang tersedia.',
            'jenisMKInput.in' => 'Pilih Jenis Mata Kuliah dari pilihan yang tersedia.',
            'dosenInput1.in' => 'Pilih Dosen 1 dari pilihan yang tersedia.',
            'dosenInput2.in' => 'Pilih Dosen 2 dari pilihan yang tersedia (jika tidak ada pilih tidak ada).',
            'ruanganInput.in' => 'Pilih Ruangan dari pilihan yang tersedia.',
            'saranDosenInput.required' => 'Kolom Saran Dosen harus diisi.',
            'saranTKInput.required' => 'Kolom Saran Tenaga Kependidikan harus diisi.',
            'saranProdiInput.required' => 'Kolom Saran Program Studi harus diisi.',
            'b11.required' => 'Instrumen bagian 1 nomor 1 harus diisi.',
            'b12.required' => 'Instrumen bagian 1 nomor 2 harus diisi.',
            'b13.required' => 'Instrumen bagian 1 nomor 3 harus diisi.',
            'b14.required' => 'Instrumen bagian 1 nomor 4 harus diisi.',
            'b15.required' => 'Instrumen bagian 1 nomor 5 harus diisi.',
            'b16.required' => 'Instrumen bagian 1 nomor 6 harus diisi.',
            'b17.required' => 'Instrumen bagian 1 nomor 7 harus diisi.',
            'b18.required' => 'Instrumen bagian 1 nomor 8 harus diisi.',
            'b21.in' => 'Instrumen bagian 2 nomor 1 harus diisi.',
            'b22.in' => 'Instrumen bagian 2 nomor 2 harus diisi.',
            'b23.in' => 'Instrumen bagian 2 nomor 3 harus diisi.',
            'b31.required' => 'Instrumen bagian 3 nomor 1 harus diisi.',
            'b32.required' => 'Instrumen bagian 3 nomor 2 harus diisi.',
            'b33.required' => 'Instrumen bagian 3 nomor 3 harus diisi.',
            'b34.required' => 'Instrumen bagian 3 nomor 4 harus diisi.',
            'b41.required' => 'Instrumen bagian 4 nomor 1 harus diisi.',
            'b42.required' => 'Instrumen bagian 4 nomor 2 harus diisi.',
            'b43.required' => 'Instrumen bagian 4 nomor 3 harus diisi.',
            'b51.required' => 'Instrumen bagian 5 nomor 1 harus diisi.',
            'b52.required' => 'Instrumen bagian 5 nomor 2 harus diisi.',
            'b53.required' => 'Instrumen bagian 5 nomor 3 harus diisi.',
            'b54.required' => 'Instrumen bagian 5 nomor 4 harus diisi.',
            'namaAdminInput.in' => 'Kolom Nama Admin harus diisi.',
        ];
    }
}

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Angket Evaluasi Perkuliahan Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="select2-bootstrap-5-theme.min.css" />
    <script src="js/kuesioner1.js"></script>
</head>

<body>
    <header style="background-color: #028391" class="pt-3 pb-4 text-light home" id="home">
        <div style="width: 3rem" class="mx-auto m-0 p-0">
            <img src="logo.png" class="img-fluid" alt="">
        </div>
        <h1 class="fs-4 text-center m-0 p-0 mt-2">EVALUASI PERKULIAHAN DOSEN <br> FAKULTAS ILMU KOMPUTER UNSRI <br>
            SEMESTER {{ $semester }} TAHUN {{ $tahun_ajaran_1 }}/{{ $tahun_ajaran_2 }}</h1>
    </header>

    <div class="container mt-4 home">
        {!! $deskripsi !!}
    </div>

    <div>
        <form method="POST" action="/responden">
            @csrf

            <div class="mt-4 p-5 border shadow-sm home container" style="background-color: #F9F9F9">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="fs-4 mb-4">IDENTITAS RESPONDEN</h2>
                <div class="row mt-3">
                    <div class="mb-3 col">
                        <label for="programStudiInput" class="form-label">Program Studi</label>
                        <select class="form-select border-dark @error('programStudiInput') is-invalid @enderror"
                            aria-label="Pilihan program studi" id="programStudiInput" name="programStudiInput">
                            <option selected>Pilih program studi</option>
                            @foreach ($programStudis as $programStudi)
                                <option value="{{ $programStudi }}">{{ $programStudi }}</option>
                            @endforeach
                        </select>
                        @error('programStudiInput')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <label for="semesterInput" class="form-label">Semester</label>
                        <select class="form-select border-dark @error('semesterInput') is-invalid @enderror"
                            aria-label="Pilihan semester" id="semesterInput" name="semesterInput">
                            <option selected>Pilih semester</option>

                            @if ($semester === 'GENAP')
                                <option value="2">Semester 2</option>
                                <option value="4">Semester 4</option>
                                <option value="6">Semester 6</option>
                                <option value="8">Semester 8</option>
                                <option value="10">Semester 10</option>
                                <option value="12">Semester 12</option>
                                <option value="14">Semester 14</option>
                            @else
                                <option value="1">Semester 1</option>
                                <option value="3">Semester 3</option>
                                <option value="5">Semester 5</option>
                                <option value="7">Semester 7</option>
                                <option value="9">Semester 9</option>
                                <option value="11">Semester 11</option>
                                <option value="13">Semester 13</option>
                            @endif
                        </select>
                        @error('semesterInput')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="nimInput" class="form-label">NIM</label>
                        <input type="text" class="form-control border-dark @error('nimInput') is-invalid @enderror"
                            id="nimInput" name="nimInput" aria-describedby="nimHelp" value="{{ old('nimInput') }}">
                        @error('nimInput')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <label for="tanggalInput" class="form-label">Tanggal Pengisian</label>
                        <input type="text" class="form-control border-dark" id="tanggalInput" name="tanggalInput"
                            value="{{ date('Y-m-d') }}" readonly>
                    </div>
                </div>
                <h2 class="fs-4 mt-5">IDENTITAS PERKULIAHAN YANG DI EVALUASI</h2>
                <div class="row mt-3">
                    <div class="mb-3 col">
                        <label for="kelasInput" class="form-label">Kelas</label>
                        <select class="form-select border-dark @error('kelasInput') is-invalid @enderror"
                            aria-label="Pilihan kelas" id="kelasInput" name="kelasInput">
                            <option selected>Pilih kelas</option>
                            @forelse ($kelas as $kel)
                                <option jurusan="{{ $kel->nama }}" value="{{ $kel->kelas }}">{{ $kel->kelas }}
                                </option>
                            @empty
                                <option value="indralaya">Indralaya</option>
                                <option value="bukit">Bukit</option>
                            @endforelse
                        </select>
                        @error('kelasInput')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <label for="hariInput" class="form-label">Hari Perkuliahan</label>
                        <select class="form-select border-dark @error('hariInput') is-invalid @enderror"
                            aria-label="Pilihan hari perkuliahan" id="hariInput" name="hariInput">
                            <option selected>Pilih hari perkuliahan</option>
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                        </select>
                        @error('hariInput')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="namaMKInput" class="form-label">Nama Mata Kuliah</label>
                        <select class="form-select border-dark @error('namaMKInput') is-invalid @enderror"
                            aria-label="Pilihan nama mata kuliah" id="namaMKInput" name="namaMKInput">
                            <option selected>Pilih nama mata kuliah</option>
                            @foreach ($mata_kuliahs as $mata_kuliah)
                                <option>{{ $mata_kuliah->nama_mk }}</option>
                            @endforeach
                        </select>
                        @error('namaMKInput')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <label for="jenisMKInput" class="form-label">Jenis Mata Kuliah</label>
                        <select class="form-select border-dark @error('jenisMKInput') is-invalid @enderror"
                            aria-label="Pilihan jenis mata kuliah" id="jenisMKInput" name="jenisMKInput">
                            <option selected>Pilih jenis mata kuliah</option>
                            @foreach ($jenisMataKuliah as $jenis)
                                <option value="{{ $jenis }}">{{ $jenis }}</option>
                            @endforeach
                        </select>
                        @error('jenisMKInput')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="dosenInput1" class="form-label">Nama Dosen 1</label>
                        <select class="form-select border-dark @error('dosenInput1') is-invalid @enderror"
                            aria-label="Pilihan nama dosen" id="dosenInput1" name="dosenInput1">
                            <option selected>Pilih nama dosen</option>
                            @foreach ($dosens as $dosen)
                                <option>{{ $dosen->nama }}</option>
                            @endforeach
                        </select>
                        @error('dosenInput1')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <label for="dosenInput2" class="form-label">Nama Dosen 2 (jika tidak ada pilih tidak
                            ada)</label>
                        <select class="form-select border-dark @error('dosenInput2') is-invalid @enderror"
                            aria-label="Pilihan nama dosen" id="dosenInput2" name="dosenInput2">
                            <option selected>Pilih nama dosen</option>
                            <option value="-">TIDAK ADA DOSEN KEDUA DALAM MK</option>
                            @foreach ($dosens as $dosen)
                                <option>{{ $dosen->nama }}</option>
                            @endforeach
                        </select>
                        @error('dosenInput2')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="ruanganInput" class="form-label">Nama Ruangan</label>
                    <select class="form-select border-dark @error('ruanganInput') is-invalid @enderror"
                        aria-label="Pilihan nama ruangan" id="ruanganInput" name="ruanganInput">
                        <option selected>Pilih nama ruangan</option>
                        @foreach ($ruangans as $ruangan)
                            @if ($ruangan->disabled != 1)
                                <option value="{{ $ruangan->nama }}">{{ $ruangan->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('ruanganInput')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                    <h3 class="text-danger font-weight-bold mt-4" id="peringatan">Harap isi seluruh kolom sebelum
                        lanjut.</h3>
                    <h3 class="text-danger font-weight-bold mt-4" id="peringatanNIM">Anda harus menggunakan NIM
                        Fakultas Ilmu Komputer untuk mengisi kuesioner ini.</h3>
                    <h3 class="text-danger font-weight-bold mt-4" id="peringatanMK">NIM Anda telah mengisi kuesioner
                        untuk Mata Kuliah ini. Silahkan ubah Mata Kuliah.</h3>
                </div>
            </div>
            <div class="container d-flex flex-row-reverse">
                <button class="btn mt-4 mb-5 text-light fw-bold px-5" style="background-color: #028391"
                    type="button" id="selanjutnya1">Selanjutnya</button>
            </div>

            {{-- Mulai ke Form --}}
            <div class="text-center pt-5 rounded-bottom-5 shadow container-fluid" id="form_navigation">
                <div class="row container mx-auto">
                    <div class="col bagian1_nav"><span class="fw-bold">BAGIAN
                            1</span><br>Persiapan dan
                        Kompetensi Dosen dalam Perkuliahan
                        <hr class="mx-auto border-5 my-0 py-0 mt-2" style="width: 12rem; opacity: 1" id="hr1">
                    </div>
                    <div class="col bagian2_nav"><span class="fw-bold">BAGIAN 2</span><br>Kedisiplinan Dosen
                        <hr class="mx-auto border-5 my-0 py-0 mt-2" style="width: 12rem; opacity: 1" id="hr2">
                    </div>
                    <div class="col bagian3_nav"><span class="fw-bold">BAGIAN 3</span><br>Cara Penilaian Dosen
                        <hr class="mx-auto border-5 my-0 py-0 mt-2" style="width: 12rem; opacity: 1" id="hr3">
                    </div>
                    <div class="col bagian4_nav"><span class="fw-bold">BAGIAN 4</span><br>Layanan Administrasi
                        <hr class="mx-auto border-5 my-0 py-0 mt-2" style="width: 12rem; opacity: 1" id="hr4">
                    </div>
                    <div class="col bagian5_nav"><span class="fw-bold">BAGIAN 5</span><br>Sarana Prasarana
                        <hr class="mx-auto border-5 my-0 py-0 mt-2" style="width: 12rem; opacity: 1" id="hr5">
                    </div>
                </div>
            </div>


            <div class="bagian1 container px-0" id="bagian1">
                @foreach ($instrumens as $instrumen)
                    @if ($instrumen->bagian === 1)
                        <div class="p-4 rounded-4 mt-5 border shadow" style="background-color: #F5F5F5">
                            <p class="m-0 mb-2 p-0">{{ $instrumen->instrumen }}</p>
                            <div class="form-check">
                                <input class="form-check-input @error('b1' . $instrumen->nomor) is-invalid @enderror"
                                    type="radio" name="b1{{ $instrumen->nomor }}"
                                    id="sangatTidakSetuju{{ $instrumen->id }}" value="1">
                                <label class="form-check-label" for="sangatTidakSetuju">
                                    Sangat Tidak Setuju
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('b1' . $instrumen->nomor) is-invalid @enderror"
                                    type="radio" name="b1{{ $instrumen->nomor }}"
                                    id="tidakSetuju{{ $instrumen->id }}" value="2">
                                <label class="form-check-label" for="tidakSetuju">
                                    Tidak Setuju
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('b1' . $instrumen->nomor) is-invalid @enderror"
                                    type="radio" name="b1{{ $instrumen->nomor }}" id="netral{{ $instrumen->id }}"
                                    value="3">
                                <label class="form-check-label" for="netral">
                                    Netral
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('b1' . $instrumen->nomor) is-invalid @enderror"
                                    type="radio" name="b1{{ $instrumen->nomor }}" id="setuju{{ $instrumen->id }}"
                                    value="4">
                                <label class="form-check-label" for="setuju">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('b1' . $instrumen->nomor) is-invalid @enderror"
                                    type="radio" name="b1{{ $instrumen->nomor }}"
                                    id="sangatSetuju{{ $instrumen->id }}" value="5">
                                <label class="form-check-label" for="sangatSetuju">
                                    Sangat Setuju
                                </label>
                            </div>
                            @error('b1' . $instrumen->nomor)
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    @endif
                @endforeach

                <div class="container d-flex flex-row-reverse">
                    <button class="btn mt-4 mb-5 text-light fw-bold px-5" style="background-color: #028391"
                        type="button" id="selanjutnya2">Selanjutnya</button>
                    <button class="btn mt-4 mb-5 me-3 fw-bold px-5" style="border-color: #028391; color: #028391"
                        type="button" id="sebelumnya1">Sebelumnya</button>
                </div>
            </div>

            <div class="bagian2 container-fluid px-0" id="bagian2">

                <div class="container">

                    <div class="p-4 rounded-4 mt-5 border shadow" style="background-color: #F5F5F5">
                        <p class="m-0 mb-2 p-0">Berapa kali full pertemuan dosen mengajar baik offline dan online
                            (sudah termasuk UTS dan UAS)</p>
                        <select class="form-select @error('b21') is-invalid @enderror" name="b21"
                            id="b21">
                            <option>Pilih jumlah pertemuan</option>
                            <option value="0" class="val0">0 pertemuan</option>
                            <option value="1" class="val1">1 pertemuan</option>
                            <option value="2" class="val2">2 pertemuan</option>
                            <option value="3" class="val3">3 pertemuan</option>
                            <option value="4" class="val4">4 pertemuan</option>
                            <option value="5" class="val5">5 pertemuan</option>
                            <option value="6" class="val6">6 pertemuan</option>
                            <option value="7" class="val7">7 pertemuan</option>
                            <option value="8" class="val8">8 pertemuan</option>
                            <option value="9" class="val9">9 pertemuan</option>
                            <option value="10" class="val10">10 pertemuan</option>
                            <option value="11" class="val11">11 pertemuan</option>
                            <option value="12" class="val12">12 pertemuan</option>
                            <option value="13" class="val13">13 pertemuan</option>
                            <option value="14" class="val14">14 pertemuan</option>
                            <option value="15" class="val15">15 pertemuan</option>
                            <option value="16" class="val16">16 pertemuan</option>
                        </select>
                        @error('b21')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="p-4 rounded-4 mt-5 border shadow" style="background-color: #F5F5F5">
                        <p class="m-0 mb-2 p-0">Berapa kali pertemuan dosen dengan mahasiswa secara offline (sudah
                            termasuk UTS dan UAS)</p>
                        <select class="form-select @error('b22') is-invalid @enderror" name="b22"
                            id="b22">
                            <option>Pilih jumlah pertemuan</option>
                            <option value="0" class="val0">0 pertemuan</option>
                            <option value="1" class="val1">1 pertemuan</option>
                            <option value="2" class="val2">2 pertemuan</option>
                            <option value="3" class="val3">3 pertemuan</option>
                            <option value="4" class="val4">4 pertemuan</option>
                            <option value="5" class="val5">5 pertemuan</option>
                            <option value="6" class="val6">6 pertemuan</option>
                            <option value="7" class="val7">7 pertemuan</option>
                            <option value="8" class="val8">8 pertemuan</option>
                            <option value="9" class="val9">9 pertemuan</option>
                            <option value="10" class="val10">10 pertemuan</option>
                            <option value="11" class="val11">11 pertemuan</option>
                            <option value="12" class="val12">12 pertemuan</option>
                            <option value="13" class="val13">13 pertemuan</option>
                            <option value="14" class="val14">14 pertemuan</option>
                            <option value="15" class="val15">15 pertemuan</option>
                            <option value="16" class="val16">16 pertemuan</option>
                        </select>
                        @error('b22')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="p-4 rounded-4 mt-5 border shadow" style="background-color: #F5F5F5">
                        <p class="m-0 mb-2 p-0">Berapa kali pertemuan dosen berbasis e-learning (sudah termasuk UTS dan
                            UAS)</p>
                        <select class="form-select @error('b23') is-invalid @enderror" name="b23"
                            id="b23">
                            <option>Pilih jumlah pertemuan</option>
                            <option value="0" class="val0">0 pertemuan</option>
                            <option value="1" class="val1">1 pertemuan</option>
                            <option value="2" class="val2">2 pertemuan</option>
                            <option value="3" class="val3">3 pertemuan</option>
                            <option value="4" class="val4">4 pertemuan</option>
                            <option value="5" class="val5">5 pertemuan</option>
                            <option value="6" class="val6">6 pertemuan</option>
                            <option value="7" class="val7">7 pertemuan</option>
                            <option value="8" class="val8">8 pertemuan</option>
                            <option value="9" class="val9">9 pertemuan</option>
                            <option value="10" class="val10">10 pertemuan</option>
                            <option value="11" class="val11">11 pertemuan</option>
                            <option value="12" class="val12">12 pertemuan</option>
                            <option value="13" class="val13">13 pertemuan</option>
                            <option value="14" class="val14">14 pertemuan</option>
                            <option value="15" class="val15">15 pertemuan</option>
                            <option value="16" class="val16">16 pertemuan</option>
                        </select>
                        @error('b23')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="container d-flex flex-row-reverse">
                        <button class="btn mt-4 mb-5 text-light fw-bold px-5" style="background-color: #028391"
                            type="button" id="selanjutnya3">Selanjutnya</button>
                        <button class="btn mt-4 mb-5 me-3 fw-bold px-5" style="border-color: #028391; color: #028391"
                            type="button" id="sebelumnya2">Sebelumnya</button>
                    </div>
                </div>
            </div>

            <div class="bagian3 container-fluid px-0" id="bagian3">

                <div class="container">

                    @foreach ($instrumens as $instrumen)
                        @if ($instrumen->bagian === 3)
                            <div class="p-4 rounded-4 mt-5 border shadow" style="background-color: #F5F5F5">
                                <p class="m-0 mb-2 p-0">{{ $instrumen->instrumen }}</p>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b3' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b3{{ $instrumen->nomor }}"
                                        id="sangatTidakSetuju{{ $instrumen->nomor }}" value="1">
                                    <label class="form-check-label" for="sangatTidakSetuju">
                                        Sangat Tidak Setuju
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b3' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b3{{ $instrumen->nomor }}"
                                        id="tidakSetuju{{ $instrumen->nomor }}" value="2">
                                    <label class="form-check-label" for="tidakSetuju">
                                        Tidak Setuju
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b3' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b3{{ $instrumen->nomor }}"
                                        id="netral{{ $instrumen->nomor }}" value="3">
                                    <label class="form-check-label" for="netral">
                                        Netral
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b3' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b3{{ $instrumen->nomor }}"
                                        id="setuju{{ $instrumen->nomor }}" value="4">
                                    <label class="form-check-label" for="setuju">
                                        Setuju
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b3' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b3{{ $instrumen->nomor }}"
                                        id="sangatSetuju{{ $instrumen->nomor }}" value="5">
                                    <label class="form-check-label" for="sangatSetuju">
                                        Sangat Setuju
                                    </label>
                                </div>
                                @error('b3' . $instrumen->nomor)
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        @endif
                    @endforeach

                    <div class="container d-flex flex-row-reverse">
                        <button class="btn mt-4 mb-5 text-light fw-bold px-5" style="background-color: #028391"
                            type="button" id="selanjutnya4">Selanjutnya</button>
                        <button class="btn mt-4 mb-5 me-3 fw-bold px-5" style="border-color: #028391; color: #028391"
                            type="button" id="sebelumnya3">Sebelumnya</button>
                    </div>
                </div>
            </div>

            <div class="bagian4 container-fluid px-0" id="bagian4">

                <div class="container">
                    <div class="p-4 rounded-4 mt-5 border shadow" style="background-color: #F5F5F5">
                        <label for="namaAdminInput" class="form-label">Nama Admin</label>
                        <select class="form-select @error('namaAdminInput') is-invalid @enderror"
                            name="namaAdminInput">
                            <option>Pilih nama admin</option>
                            @foreach ($namaAdmins as $namaAdmin)
                                <option value="{{ $namaAdmin }}">{{ $namaAdmin }}</option>
                            @endforeach
                        </select>
                        @error('namaAdminInput')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    @foreach ($instrumens as $instrumen)
                        @if ($instrumen->bagian === 4)
                            <div class="p-4 rounded-4 mt-5 border shadow" style="background-color: #F5F5F5">
                                <p class="m-0 mb-2 p-0">{{ $instrumen->instrumen }}</p>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b4' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b4{{ $instrumen->nomor }}"
                                        id="sangatTidakSetuju{{ $instrumen->nomor }}" value="1">
                                    <label class="form-check-label" for="sangatTidakSetuju">
                                        Sangat Tidak Setuju
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b4' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b4{{ $instrumen->nomor }}"
                                        id="tidakSetuju{{ $instrumen->nomor }}" value="2">
                                    <label class="form-check-label" for="tidakSetuju">
                                        Tidak Setuju
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b4' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b4{{ $instrumen->nomor }}"
                                        id="netral{{ $instrumen->nomor }}" value="3">
                                    <label class="form-check-label" for="netral">
                                        Netral
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b4' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b4{{ $instrumen->nomor }}"
                                        id="setuju{{ $instrumen->nomor }}" value="4">
                                    <label class="form-check-label" for="setuju">
                                        Setuju
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b4' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b4{{ $instrumen->nomor }}"
                                        id="sangatSetuju{{ $instrumen->nomor }}" value="5">
                                    <label class="form-check-label" for="sangatSetuju">
                                        Sangat Setuju
                                    </label>
                                </div>
                                @error('b4' . $instrumen->nomor)
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        @endif
                    @endforeach

                    <div class="container d-flex flex-row-reverse">
                        <button class="btn mt-4 mb-5 text-light fw-bold px-5" style="background-color: #028391"
                            type="button" id="selanjutnya5">Selanjutnya</button>
                        <button class="btn mt-4 mb-5 me-3 fw-bold px-5" style="border-color: #028391; color: #028391"
                            type="button" id="sebelumnya4">Sebelumnya</button>
                    </div>
                </div>
            </div>

            <div class="bagian5 container-fluid px-0" id="bagian5">
                <div class="container">

                    @foreach ($instrumens as $instrumen)
                        @if ($instrumen->bagian === 5)
                            <div class="p-4 rounded-4 mt-5 border shadow" style="background-color: #F5F5F5">
                                <p class="m-0 mb-2 p-0">{{ $instrumen->instrumen }}</p>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b5' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b5{{ $instrumen->nomor }}"
                                        id="sangatTidakSetuju{{ $instrumen->nomor }}" value="1">
                                    <label class="form-check-label" for="sangatTidakSetuju">
                                        Sangat Tidak Setuju
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b5' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b5{{ $instrumen->nomor }}"
                                        id="tidakSetuju{{ $instrumen->nomor }}" value="2">
                                    <label class="form-check-label" for="tidakSetuju">
                                        Tidak Setuju
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b5' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b5{{ $instrumen->nomor }}"
                                        id="netral{{ $instrumen->nomor }}" value="3">
                                    <label class="form-check-label" for="netral">
                                        Netral
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b5' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b5{{ $instrumen->nomor }}"
                                        id="setuju{{ $instrumen->nomor }}" value="4">
                                    <label class="form-check-label" for="setuju">
                                        Setuju
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('b5' . $instrumen->nomor) is-invalid @enderror"
                                        type="radio" name="b5{{ $instrumen->nomor }}"
                                        id="sangatSetuju{{ $instrumen->nomor }}" value="5">
                                    <label class="form-check-label" for="sangatSetuju">
                                        Sangat Setuju
                                    </label>
                                </div>
                                @error('b5' . $instrumen->nomor)
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        @endif
                    @endforeach
                    <div class="container d-flex flex-row-reverse">
                        <button class="btn mt-4 mb-5 text-light fw-bold px-5" style="background-color: #028391"
                            type="button" id="selanjutnya6">Selanjutnya</button>
                        <button class="btn mt-4 mb-5 me-3 fw-bold px-5" style="border-color: #028391; color: #028391"
                            type="button" id="sebelumnya5">Sebelumnya</button>
                    </div>
                </div>
            </div>

            <div class="bagian6 container-fluid px-0" id="bagian6">
                <div class="container row mt-4 p-5 border shadow-sm mx-auto mb-5" style="background-color: #F9F9F9">
                    <h2 class="fs-4 mb-4">Berikan Saran Terhadap Aspek Reliability (kehandalan dosen, Tenaga
                        Administrasi)</h2>
                    <div>
                        <label for="saranDosenInput" class="form-label">Saran untuk Dosen</label>
                        <input type="text"
                            class="form-control border-dark @error('saranDosenInput') is-invalid @enderror"
                            id="saranDosenInput" name="saranDosenInput" value="{{ old('saranDosenInput') }}">
                        @error('saranDosenInput')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="saranTKInput" class="form-label mt-4">Saran untuk Tenaga Kependidikan</label>
                        <input type="text"
                            class="form-control border-dark @error('saranTKInput') is-invalid @enderror"
                            id="saranTKInput" name="saranTKInput" value="{{ old('saranTKInput') }}">
                        @error('saranTKInput')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="saranProdiInput" class="form-label mt-4">Saran untuk Program Studi</label>
                        <input type="text"
                            class="form-control border-dark @error('saranProdiInput') is-invalid @enderror"
                            id="saranProdiInput" name="saranProdiInput" value="{{ old('saranProdiInput') }}">
                        @error('saranProdiInput')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mx-auto">
                        <div class="col-5">
                            <button class="btn mt-4 me-3 fw-bold px-5" style="border-color: #028391; color: #028391"
                                type="button" id="sebelumnya6">Sebelumnya</button>
                        </div>
                        <div class="col-2 text-center">
                            <button class="btn text-light fw-bold px-5 mt-4 mx-auto" style="background-color: #319A00"
                                type="submit" id="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link
        href="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-2.1.2/af-2.7.0/b-3.1.0/b-colvis-3.1.0/b-html5-3.1.0/b-print-3.1.0/cr-2.0.3/date-1.5.3/fc-5.0.1/fh-4.0.1/kt-2.12.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.7.1/sp-2.3.1/sl-2.0.3/datatables.min.css"
        rel="stylesheet">

    <title>Lihat Data Responden</title>

</head>

<body class="container-fluid mb-5 pb-5">
    <table class="table table-responsive" id="myTable">
        <thead>
            <tr>
                <th scope="col">Nomor</th>
                <th scope="col">NIM</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Jenis Mata Kuliah</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Kelas</th>
                <th scope="col">Semester</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Hari</th>
                <th scope="col">Dosen 1</th>
                <th scope="col">Dosen 2</th>
                <th scope="col">Nilai Persiapan dan Kompetensi Dosen</th>
                <th scope="col">Ruangan</th>
                @for ($i = 0; $i < count($responden->first()['b1']); $i++)
                    <th scope="col">B1{{ $i + 1 }}</th>
                @endfor
                @for ($i = 0; $i < count($responden->first()['b2']); $i++)
                    <th scope="col">B2{{ $i + 1 }}</th>
                @endfor
                @for ($i = 0; $i < count($responden->first()['b3']); $i++)
                    <th scope="col">B3{{ $i + 1 }}</th>
                @endfor
                <th scope="col">Nama Admin</th>
                @for ($i = 0; $i < count($responden->first()['b4']); $i++)
                    <th scope="col">B4{{ $i + 1 }}</th>
                @endfor
                @for ($i = 0; $i < count($responden->first()['b5']); $i++)
                    <th scope="col">B5{{ $i + 1 }}</th>
                @endfor
                <th scope="col">Saran Dosen</th>
                <th scope="col">Saran Tenaga Kependidikan</th>
                <th scope="col">Saran Program Studi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($responden as $resp)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $resp['nim'] ?? '-' }}</td>
                    <td>{{ $resp['nama_mk'] ?? '-' }}</td>
                    <td>{{ $resp['jenis_mk'] ?? '-' }}</td>
                    <td>{{ $resp['program_studi'] ?? '-' }}</td>
                    <td>{{ $resp['kelas'] ?? '-' }}</td>
                    <td>{{ $resp['semester'] ?? '-' }}</td>
                    <td>{{ $resp['tanggal'] ?? '-' }}</td>
                    <td>{{ $resp['hari'] ?? '-' }}</td>
                    <td>{{ $resp['dosen1'] ?? '-' }}</td>
                    <td>{{ $resp['dosen2'] ?? '-' }}</td>
                    <td>
                        @foreach ($nilaiDosen as $h)
                            @if (
                                $resp['dosen1'] == $h['dosen1'] &&
                                    $resp['dosen2'] == $h['dosen2'] &&
                                    $resp['program_studi'] == $h['program_studi'] &&
                                    $resp['nama_mk'] == $h['nama_mk']
                            )
                                {{ number_format($h['rataNilai'], 2, '.', ',') }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $resp['ruangan'] ?? '-' }}</td>
                    @for ($i = 0; $i < count($resp['b1']); $i++)
                        <td>{{ $resp['b1'][$i] ?? '-' }}</td>
                    @endfor
                    @for ($i = 0; $i < count($resp['b2']); $i++)
                        <td>{{ $resp['b2'][$i] ?? '-' }}</td>
                    @endfor
                    @for ($i = 0; $i < count($resp['b3']); $i++)
                        <td>{{ $resp['b3'][$i] ?? '-' }}</td>
                    @endfor
                    <td>{{ $resp['namaAdmin'] }}</td>
                    @for ($i = 0; $i < count($resp['b4']); $i++)
                        <td>{{ $resp['b4'][$i] ?? '-' }}</td>
                    @endfor
                    @for ($i = 0; $i < count($resp['b5']); $i++)
                        <td>{{ $resp['b5'][$i] ?? '-' }}</td>
                    @endfor
                    <td>{{ $resp['saranDosen'] ?? '-' }}</td>
                    <td>{{ $resp['saranTenagaKependidikan'] ?? '-' }}</td>
                    <td>{{ $resp['saranProgramStudi'] ?? '-' }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-2.1.2/af-2.7.0/b-3.1.0/b-colvis-3.1.0/b-html5-3.1.0/b-print-3.1.0/cr-2.0.3/date-1.5.3/fc-5.0.1/fh-4.0.1/kt-2.12.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.7.1/sp-2.3.1/sl-2.0.3/datatables.min.js">
    </script>

    <script>
        let table = new DataTable('#myTable', {
            lengthMenu: [
                [10, 25, 50, 100, 200, 300, -1],
                [10, 25, 50, 100, 200, 300, 'Tampilkan Semua']
            ],
            layout: {
                top3Start: 'searchBuilder',
                top2Start: {
                    buttons: ['colvis']
                },
                top2End: {
                    buttons: [
                        'copy', 'excel', {
                            extend: 'pdf',
                            text: 'PDF',
                            exportOptions: {
                                // modifier: {
                                //     page: 'current'
                                // }
                            },
                            orientation: 'landscape',
                            pageSize: 'A1',
                            download: 'open'
                        }
                    ]
                }
            },
            select: true,
            rowReorder: true,
            colReorder: true,
            autoFill: true,
            keys: true,
            language: {
                "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "infoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "lengthMenu": "Tampilkan _MENU_ entri",
                "loadingRecords": "Sedang memuat...",
                "processing": "Sedang memproses...",
                "search": "Cari:",
                "zeroRecords": "Tidak ditemukan data yang sesuai",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                },
                "aria": {
                    "sortAscending": ": aktifkan untuk mengurutkan kolom ke atas",
                    "sortDescending": ": aktifkan untuk mengurutkan kolom menurun"
                },
                "autoFill": {
                    "fill": "Isi semua sel dengan <i>%d<\/i>",
                    "fillHorizontal": "Isi sel secara horizontal",
                    "fillVertical": "Isi sel secara vertikal",
                    "cancel": "Batal",
                    "info": "Info"
                },
                "buttons": {
                    "collection": "Kumpulan <span class='ui-button-icon-primary ui-icon ui-icon-triangle-1-s'\/>",
                    "colvis": "Visibilitas Kolom",
                    "colvisRestore": "Kembalikan visibilitas",
                    "copy": "Salin",
                    "copySuccess": {
                        "_": "%d baris disalin ke papan klip",
                        "1": "satu baris disalin ke papan klip"
                    },
                    "copyTitle": "Salin ke Papan klip",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Tampilkan semua baris",
                        "_": "Tampilkan %d baris",
                        "1": "Tampilkan satu baris"
                    },
                    "pdf": "PDF",
                    "print": "Cetak",
                    "copyKeys": "Tekan ctrl atau u2318 + C untuk menyalin tabel ke papan klip.<br \/><br \/>Untuk membatalkan, klik pesan ini atau tekan esc.",
                    "createState": "Tambahkan Data",
                    "removeAllStates": "Hapus Semua Data",
                    "removeState": "Hapus Data",
                    "renameState": "Rubah Nama",
                    "savedStates": "SImpan Data",
                    "stateRestore": "Publihkan Data",
                    "updateState": "Perbaharui data"
                },
                "searchBuilder": {
                    "add": "Tambah Kondisi",
                    "button": {
                        "0": "Cari Builder",
                        "_": "Cari Builder (%d)"
                    },
                    "clearAll": "Bersihkan Semua",
                    "condition": "Kondisi",
                    "data": "Data",
                    "deleteTitle": "Hapus filter",
                    "leftTitle": "Ke Kiri",
                    "logicAnd": "Dan",
                    "logicOr": "Atau",
                    "rightTitle": "Ke Kanan",
                    "title": {
                        "0": "Cari Builder",
                        "_": "Cari Builder (%d)"
                    },
                    "value": "Nilai",
                    "conditions": {
                        "date": {
                            "after": "Setelah",
                            "before": "Sebelum",
                            "between": "Diantara",
                            "empty": "Kosong",
                            "equals": "Sama dengan",
                            "not": "Tidak sama",
                            "notBetween": "Tidak diantara",
                            "notEmpty": "Tidak kosong"
                        },
                        "number": {
                            "empty": "Kosong",
                            "equals": "Sama dengan",
                            "gt": "Lebih besar dari",
                            "gte": "Lebih besar atau sama dengan",
                            "lt": "Lebih kecil dari",
                            "lte": "Lebih kecil atau sama dengan",
                            "not": "Tidak sama",
                            "notEmpty": "Tidak kosong",
                            "between": "Di antara",
                            "notBetween": "Tidak di antara"
                        },
                        "string": {
                            "contains": "Berisi",
                            "empty": "Kosong",
                            "endsWith": "Diakhiri dengan",
                            "not": "Tidak sama",
                            "notEmpty": "Tidak kosong",
                            "startsWith": "Diawali dengan",
                            "equals": "Sama dengan",
                            "notContains": "Tidak Berisi",
                            "notStartsWith": "Tidak diawali Dengan",
                            "notEndsWith": "Tidak diakhiri Dengan"
                        },
                        "array": {
                            "equals": "Sama dengan",
                            "empty": "Kosong",
                            "contains": "Berisi",
                            "not": "Tidak",
                            "notEmpty": "Tidak kosong",
                            "without": "Tanpa"
                        }
                    }
                },
                "searchPanes": {
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "collapse": {
                        "0": "Panel Pencarian",
                        "_": "Panel Pencarian (%d)"
                    },
                    "emptyPanes": "Tidak Ada Panel Pencarian",
                    "loadMessage": "Memuat Panel Pencarian",
                    "clearMessage": "Bersihkan",
                    "title": "Saringan Aktif - %d",
                    "showMessage": "Tampilkan",
                    "collapseMessage": "Ciutkan"
                },
                "infoThousands": ",",
                "datetime": {
                    "previous": "Sebelumnya",
                    "next": "Selanjutnya",
                    "hours": "Jam",
                    "minutes": "Menit",
                    "seconds": "Detik",
                    "unknown": "-",
                    "amPm": [
                        "am",
                        "pm"
                    ],
                    "weekdays": [
                        "Min",
                        "Sen",
                        "Sel",
                        "Rab",
                        "Kam",
                        "Jum",
                        "Sab"
                    ],
                    "months": [
                        "Januari",
                        "Februari",
                        "Maret",
                        "April",
                        "Mei",
                        "Juni",
                        "Juli",
                        "Agustus",
                        "September",
                        "Oktober",
                        "November",
                        "Desember"
                    ]
                },
                "editor": {
                    "close": "Tutup",
                    "create": {
                        "button": "Tambah",
                        "submit": "Tambah",
                        "title": "Tambah inputan baru"
                    },
                    "remove": {
                        "button": "Hapus",
                        "submit": "Hapus",
                        "confirm": {
                            "_": "Apakah Anda yakin untuk menghapus %d baris?",
                            "1": "Apakah Anda yakin untuk menghapus 1 baris?"
                        },
                        "title": "Hapus inputan"
                    },
                    "multi": {
                        "title": "Beberapa Nilai",
                        "info": "Item yang dipilih berisi nilai yang berbeda untuk input ini. Untuk mengedit dan mengatur semua item untuk input ini ke nilai yang sama, klik atau tekan di sini, jika tidak maka akan mempertahankan nilai masing-masing.",
                        "restore": "Batalkan Perubahan",
                        "noMulti": "Masukan ini dapat diubah satu per satu, tetapi bukan bagian dari grup."
                    },
                    "edit": {
                        "title": "Edit inputan",
                        "submit": "Edit",
                        "button": "Edit"
                    },
                    "error": {
                        "system": "Terjadi kesalahan pada system. (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Informasi Selebihnya<\/a>)."
                    }
                },
                "stateRestore": {
                    "creationModal": {
                        "button": "Buat",
                        "columns": {
                            "search": "Pencarian Kolom",
                            "visible": "Visibilitas Kolom"
                        },
                        "name": "Nama:",
                        "order": "Penyortiran",
                        "search": "Pencarian",
                        "select": "Pemilihan",
                        "title": "Buat State Baru",
                        "toggleLabel": "Termasuk:",
                        "paging": "Nomor Halaman",
                        "scroller": "Posisi Skrol",
                        "searchBuilder": "Cari Builder"
                    },
                    "emptyError": "Nama tidak boleh kosong.",
                    "removeConfirm": "Apakah Anda yakin ingin menghapus %s?",
                    "removeJoiner": "dan",
                    "removeSubmit": "Hapus",
                    "renameButton": "Ganti Nama",
                    "renameLabel": "Nama Baru untuk %s:",
                    "duplicateError": "Nama State ini sudah ada.",
                    "emptyStates": "Tidak ada State yang disimpan.",
                    "removeError": "Gagal menghapus State.",
                    "removeTitle": "Penghapusan State",
                    "renameTitle": "Ganti nama State"
                },
                "decimal": ",",
                "searchPlaceholder": "kata kunci pencarian",
                "select": {
                    "cells": {
                        "1": "1 sel dipilih",
                        "_": "%d sel dipilih"
                    },
                    "columns": {
                        "1": "1 kolom dirpilih",
                        "_": "%d kolom dipilih"
                    },
                    "rows": {
                        "1": "1 baris dipilih",
                        "_": "%d baris dipilih"
                    }
                },
                "thousands": "."
            },
        });
    </script>

</body>

</html>

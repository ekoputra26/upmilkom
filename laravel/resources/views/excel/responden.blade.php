<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Excel Saran</title>
</head>

<body>
    <table class="table">
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
                    <td>{{ $resp['nim'] }}</td>
                    <td>{{ $resp['nama_mk'] }}</td>
                    <td>{{ $resp['jenis_mk'] }}</td>
                    <td>{{ $resp['program_studi'] }}</td>
                    <td>{{ $resp['kelas'] }}</td>
                    <td>{{ $resp['semester'] }}</td>
                    <td>{{ $resp['tanggal'] }}</td>
                    <td>{{ $resp['hari'] }}</td>
                    <td>{{ $resp['dosen1'] }}</td>
                    <td>{{ $resp['dosen2'] }}</td>
                    <td>{{ $resp['ruangan'] }}</td>
                    @for ($i = 0; $i < count($resp['b1']); $i++)
                        <td>{{ $resp['b1'][$i] }}</td>
                    @endfor
                    @for ($i = 0; $i < count($resp['b2']); $i++)
                        <td>{{ $resp['b2'][$i] }}</td>
                    @endfor
                    @for ($i = 0; $i < count($resp['b3']); $i++)
                        <td>{{ $resp['b3'][$i] }}</td>
                    @endfor
                    <td>{{ $resp['namaAdmin'] }}</td>
                    @for ($i = 0; $i < count($resp['b4']); $i++)
                        <td>{{ $resp['b4'][$i] }}</td>
                    @endfor
                    @for ($i = 0; $i < count($resp['b5']); $i++)
                        <td>{{ $resp['b5'][$i] }}</td>
                    @endfor
                    <td>{{ $resp['saranDosen'] }}</td>
                    <td>{{ $resp['saranTenagaKependidikan'] }}</td>
                    <td>{{ $resp['saranProgramStudi'] }}</td>
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

</body>

</html>

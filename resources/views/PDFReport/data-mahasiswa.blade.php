<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h3>Data Mahasiswa</h3>
    </center>

    <table class='table table-bordered mt-3'>
        <thead>
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Kota</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $key => $item)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ date('d M Y', strtotime($item->tanggal_lahir)) }}</td>
                        <td>{{ $item->jeniskelamin }}</td>
                        <td>{{ $item->kotas->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>

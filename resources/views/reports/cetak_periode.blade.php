<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Per Periode Tertentu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
</head>

<body>
    <h5 class="text-center">Laporan Per Periode Tertentu</h5>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="40%">Deskripsi</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Jenis</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @forelse($query as $c)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $c->description }}</td>
                <td>{{ $c->getTanggalIndo() }}</td>
                <td>{{ $c->getTotalRupiah() }}</td>
                <td>{{ $c->type->type }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
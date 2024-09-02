<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Peminjaman</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

    <div class="information">
        <table width="100%">
            <tr>
                <td align="left" style="width: 40%;">
                    <h1>Laporan Pelayanan Booking</h1>
                </td>
            </tr>
    
        </table>
    </div>


<br/>

<div class="invoice">
    <h3>Jumlah Melayani Pelayanan</h3>
    <h3>{{ $getdate }} : {{ $jumahrentalbulan }}</h3>
</div>

<div class="invoice">
    <h3>Jumlah Pelayanan Yang Di Booking</h3>
    <table width="100%" align="left">
        <thead align="left">
        <tr>
            <th>No</th>
            <th>Nama Pelayanan</th>
            <th>Jumlah Melayani</th>
        </tr>
        </thead>
        <tbody>
            <?php $no = 1?>
            @foreach ($ruangan as $j => $ruangans)
            <tr>
              <td scope="row">{{ $no++ }}</td>
              <td>{{ $ruangans }}</td>
              <td>{{ $jumlahruangan[$j] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="invoice">
    <h3>Instansi Yang Melayani</h3>
    <table width="100%" align="left">
        <thead align="left">
        <tr>
            <th>No</th>
            <th>Nama Instansi</th>
            <th>Jumlah Melayani</th>
        </tr>
        </thead>
        <tbody>
            <?php $num = 1?>
            @foreach ($user as $i => $users)
            <tr>
                <td scope="row">{{ $num++ }}</td>
                <td>{{ $users }}</td>
                <td>{{ $jumlahpinjam[$i] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0; width:100%">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Booking Service
            </td>
        </tr>

    </table>
</div>
</body>
</html>
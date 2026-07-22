<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            color: #222;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 10px;
        }

        .header h3 {
            margin: 0;
            color: #0d6efd;
        }

        .header small {
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead th {
            background-color: #eef2ff;
            border: 1px solid #dbe4ff;
            padding: 6px 8px;
            text-transform: uppercase;
            font-size: 10px;
        }

        tbody td {
            border: 1px solid #ddd;
            padding: 6px 8px;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        tfoot td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            font-weight: bold;
            background-color: #f8faff;
        }
    </style>
</head>

<body>
    <div class="header">
        <h3>Laporan Transaksi</h3>
        <small>Ngawi-Rent - Rental Mobil</small>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center" style="width: 30px;">No</th>
                <th>No Polisi</th>
                <th>Nama Pemesan</th>
                <th>Alamat</th>
                <th class="text-center">Lama Sewa</th>
                <th>Tgl Pesan</th>
                <th class="text-end">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $data)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $data->mobil->nopolisi }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td class="text-center">{{ $data->lama }} Hari</td>
                    <td>{{ \Carbon\Carbon::parse($data->tgl_pesan)->translatedFormat('d M Y') }}</td>
                    <td class="text-end">Rp {{ number_format($data->total, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Data laporan belum ada</td>
                </tr>
            @endforelse
        </tbody>
        @if ($transaksi->count())
            <tfoot>
                <tr>
                    <td colspan="6" class="text-end">Total Keseluruhan</td>
                    <td class="text-end">Rp {{ number_format($transaksi->sum('total'), 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        @endif
    </table>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>PDF | Tunjangan Selesai</title>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
        }

        table {
            font-family: inherit;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border-top: 1.5px solid #e9e8e8;
            border-bottom: 1.5px solid #e9e8e8;
            text-align: center;
            padding: 12px;
        }

        .header th {
            border-top: none;
        }

        .footer td {
            border-bottom: none;
        }

        .header,
        .content,
        .footer {
            font-size: 0.9rem;
        }

        .content {
            font-weight: 400;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Tunjangan Selesai</h2>

    <table>
        <tr class="header">
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Kode</th>
            <th>Jenis Tunjangan</th>
            <th>Besar Tunjangan</th>
        </tr>
        @foreach ($benefits as $benefit)
            <tr class="content">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $benefit->employee->user->name }}</td>
                <td>{{ $benefit->created_at->translatedFormat('d M Y') }}</td>
                <td>{{ $benefit->code }}</td>
                <td style="text-transform: capitalize">{{ str_replace('_', ' ', $benefit->type) }}</td>
                <td>Rp. {{ number_format($benefit->amount, 0, '', '.') }}</td>
            </tr>
        @endforeach
        <tr class="footer">
            <td colspan="5">Jumlah Tunjangan</td>
            <td style="font-weight: 600;font-size: 1.05rem">Rp. {{ number_format($totalBenefit, 0, '', '.') }}</td>
        </tr>
    </table>
</body>

</html>

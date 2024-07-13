<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bulanan</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            margin: 0;
            padding-top: 20px;
            box-sizing: border-box;
        }

        .container {
            text-align: center;
        }

        table {
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>{{ $title }}</h1>
        <table border="1" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Tanggal Booking</th>
                    <th>Jam Booking</th>
                    <th>No Meja</th>
                    <th>Pembayaran</th>
                    <th>Status</th>
                    <th>Customer</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unduhPDF as $row)
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td>{{ $row->dinein->user->nama }}</td>
                        <td> {{ \Carbon\Carbon::parse($row->dinein->tanggal_dinein)->format('d-m-Y') }}
                        </td>
                        <td> {{ \Carbon\Carbon::parse($row->dinein->jam_dinein)->format('H:i') }}
                            WIB
                        </td>
                        <td>{{ $row->dinein->no_meja }}</td>
                        <td>
                            @if ($row->dinein->pembayaran_dinein == 0)
                                Cash
                            @elseif ($row->dinein->pembayaran_dinein == 1)
                                Transfer
                            @else
                                Error
                            @endif
                        </td>
                        <td>
                            @if ($row->dinein->status == 0)
                                Proses
                            @elseif ($row->dinein->status == 1)
                                Selesai
                            @else
                                Error
                            @endif
                        </td>
                        <td>{{ $row->dinein->customer->nama_customer }}</td>
                        <td> Rp. {{ number_format($row->total_harga, 0, ',', '.') }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

@extends('backend.v_layouts.app')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title mb-2">{{ $judul }}</h2>
                    <a href="/transaksi/create">
                        <button type="button" class="btn btn-outline-primary">Tambah</button>
                    </a>
                    <a href="/unduh-pdf" title="Cetak Data" target="_blank">
                        <span class="btn btn-outline-danger"><i class="fa fa-print"></i> Cetak PDF</span>
                    </a>
                    </h2>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="datatables table" id="dataTable-1">
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
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($index as $row)
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
                                                    <td>
                                                        <a href="{{ route('dinein.edit', $row->id) }}" title="Ubah Data">
                                                            <span class="btn btn-success btn-sm show_edit"><i
                                                                    class="fa fa-edit"></i>Ubah</span>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('dinein.destroy', $row->id) }}"
                                                            style="display: inline-block;">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm show_confirm"
                                                                data-toggle="tooltip" title='Delete'
                                                                data-konf-delete="{{ $row->id }}"><i
                                                                    class="fa fa-trash"></i>Hapus</button></button>
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end section -->
@endsection

@extends('backend.v_layouts.app')
@section('content')
    <!-- template -->
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title mb-2">{{ $judul }}</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form action="/booking" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>ID User</label>
                                            <select class="form-control @error('user_id') is-invalid @enderror"
                                                name="user_id" id="user">
                                                <option value="" selected>-- Pilih ID User --</option>
                                                @foreach ($user as $row)
                                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <span class="invalid-feedback alert-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>ID Customer</label>
                                            <select class="form-control @error('customer_id') is-invalid @enderror"
                                                name="customer_id" id="customer">
                                                <option value="" selected>-- Pilih ID Customer --</option>
                                                @foreach ($customer as $row)
                                                    <option value="{{ $row->id }}">{{ $row->nama_customer }}</option>
                                                @endforeach
                                            </select>
                                            @error('customer_id')
                                                <span class="invalid-feedback alert-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Tanggal Booking</label>
                                                <input type="date" name="tanggal_booking"
                                                    value="{{ old('tanggal_booking') }}"
                                                    class="form-control @error('tanggal_booking') is-invalid @enderror"
                                                    placeholder="Masukkan Nama Makanan">
                                                @error('tanggal_booking')
                                                    <span class="invalid-feedback alert-danger" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Jam Booking</label>
                                            <input type="time" name="jam_booking" value="{{ old('jam_booking') }}"
                                                class="form-control @error('jam_booking') is-invalid @enderror"
                                                placeholder="Masukkan Harga Makanan">
                                            @error('jam_booking')
                                                <span class="invalid-feedback alert-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>No Meja</label>
                                            <input type="text" onkeypress="return hanyaAngka(event)" name="no_meja"
                                                value="{{ old('no_meja') }}"
                                                class="form-control @error('no_meja') is-invalid @enderror"
                                                placeholder="Masukkan Nomor Meja">
                                            @error('no_meja')
                                                <span class="invalid-feedback alert-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Pembayaran</label>
                                            <select name="pembayaran_booking"
                                                class="form-control @error('pembayaran_booking') is-invalid @enderror">
                                                <option value="">-- Pilih Pembayaran --</option>
                                                <option value="0">Cash</option>
                                                <option value="1">Transfer</option>
                                            </select>
                                            @error('pembayaran_booking')
                                                <span class="invalid-feedback alert-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-success text-white">
                                                Simpan
                                            </button>
                                            <a href="{{ route('booking.index') }}">
                                                <button type="button" class="btn btn-danger">
                                                    Kembali
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-content -->
                        </div>
                        <!-- /.box-content -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end template-->
@endsection

@php
    use App\Models\Customer;
@endphp
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
                                <form action="/transaksi" method="post" enctype="multipart/form-data"
                                    class="form-horizontal">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>ID User</label>
                                            <select class="form-control @error('dinein_id') is-invalid @enderror"
                                                name="dinein_id" id="transaksi">
                                                <option value="" selected>-- Pilih ID User --</option>
                                                @foreach ($dinein as $row)
                                                    @php
                                                        $customer = Customer::find($row->customer_id);
                                                    @endphp
                                                    <option value="{{ $row->id }}">
                                                        {{ $customer ? $customer->nama_customer : 'Unknown' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('dinein_id')
                                                <span class="invalid-feedback alert-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Total</label>
                                            <input type="text" onkeypress="return hanyaAngka(event)" name="total_harga"
                                                value="{{ old('total_harga') }}"
                                                class="form-control @error('total_harga') is-invalid @enderror"
                                                placeholder="Masukkan Total">
                                            @error('total_harga')
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
                                            <a href="{{ route('transaksi.index') }}">
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

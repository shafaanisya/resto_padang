@extends('backend.v_layouts.app')
@section('content')
    <!-- template -->


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="/detailpesanan" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">{{ $sub }}</h4>

                        <div class="form-group">
                            <label>ID Pesanan</label>
                            <select class="form-control @error('pesanan_id') is-invalid @enderror" name="pesanan_id"
                                id="pesanan">
                                <option value="" selected>-- Pilih ID Pesanan --</option>
                                @foreach ($pesanan as $row)
                                    <option value="{{ $row->id }}">{{ $row->id }}</option>
                                @endforeach
                            </select>
                            @error('pesanan_id')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Status Barang</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="">-- Status --</option>
                                <option value="0">Sedang Proses</option>
                                <option value="1"> Dalam Perjalanan</option>
                                <option value="2"> Paket Diterima</option>
                            </select>
                            @error('status')
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
                            <a href="{{ route('detailpesanan.index') }}">
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
    <!-- end template-->
    <script>
        document.getElementById('produk').addEventListener('change', function() {
            var produkId = this.value;
            if (produkId) {
                fetch(`/get-produk/${produkId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('harga_produk').value = data.harga_produk;
                    });
            } else {
                document.getElementById('harga_produk').value = '';
            }
        });
    </script>
@endsection
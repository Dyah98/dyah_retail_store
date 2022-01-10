@extends('dashboard.layouts.main')

@section('content')
<!-- ============================================================== -->
<!-- RECENT SALES -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        @if (session()->has('success-edit'))
            <div class="alert alert-success" role="alert">
                {{ session('success-edit') }}
            </div>
        @endif
        @if (session()->has('destroy'))
            <div class="alert alert-danger" role="alert">
                {{ session('destroy') }}
            </div>
        @endif
        <div class="white-box">
            <div class="d-md-flex mb-3">
                <h3 class="box-title mb-0">Daftar Transaksi</h3>
                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto text-end">
                    <button class="btn btn-primary"><a href="/transaksi/create" class="text-decoration-none text-light"><i class="fas fa-plus"></i> Tambah Transaksi</a></button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table no-wrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">Kode</th>
                            <th class="border-top-0">Tanggal</th>
                            <th class="border-top-0">Nama Produk</th>
                            <th class="border-top-0">Qty</th>
                            <th class="border-top-0">Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                        @php
                            $harga_produk = "Rp. " . number_format($transaksi->total_bayar,2,",",".");
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaksi->kode_transaksi }}</td>
                            <td>{{ $transaksi->tanggal_transaksi }}</td>
                            <td>{{ $transaksi->produk->nama_produk }}</td>
                            <td>{{ $transaksi->qty }}</td>
                            <td>{{ $harga_produk }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
@endsection
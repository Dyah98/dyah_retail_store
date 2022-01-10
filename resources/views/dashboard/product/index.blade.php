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
                <h3 class="box-title mb-0">Daftar Produk</h3>
                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto text-end">
                    <button class="btn btn-primary"><a href="/produk/create" class="text-decoration-none text-light"><i class="fas fa-plus"></i> Tambah Produk</a></button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table no-wrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">Kode</th>
                            <th class="border-top-0">Nama</th>
                            <th class="border-top-0">Harga</th>
                            <th class="border-top-0">Alat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $produk)
                        @php
                            $harga_produk = "Rp. " . number_format($produk->harga,2,",",".");
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="txt-oflo">{{ $produk->kode_produk }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td class="txt-oflo">{{ $harga_produk }}</td>
                            <td>
                                <a href="/produk/{{ $produk->id }}/edit" class="btn btn-warning text-white" title="Edit Data"><i class="bi bi-pencil-square"></i></a>
                                <form action="/produk/{{ $produk->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger text-white" title="Hapus Data" onclick="return confirm('Data ini akan dihapus! Anda yakin untuk menghapus data ini?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
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

@push('script')
    
@endpush
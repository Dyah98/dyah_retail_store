@extends('dashboard.layouts.main')

@section('content')
<!-- ============================================================== -->
<!-- RECENT SALES -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="white-box">
            <form action="/produk" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Kode Produk</label>
                            <input type="text" name="kode_produk" value="{{ $kode_produk }}" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"><b>Contoh Value :</b> PRD - 1111</div>
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"><b>Contoh Value :</b> Luwak White Kopi - 1 Renceng</div>
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Harga Produk</label>
                            <input type="number" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"><b>Contoh Value :</b> 19000</div>
                        </div>  
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ============================================================== -->
@endsection
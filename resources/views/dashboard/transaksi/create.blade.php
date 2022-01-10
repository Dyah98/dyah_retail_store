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
            <form action="/transaksi" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Kode Transaksi</label>
                            <input type="text" name="kode_transaksi" value="{{ $kode_transaksi }}" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"><b>Contoh Value :</b> PRD - 1111</div>
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Tanggal Transaksi</label>
                            <input type="text" name="tanggal_transaksi" value="{{ $tanggal }}" class="form-control" readonly>
                            <div id="emailHelp" class="form-text"><b>Contoh Value :</b> 2021-12-23 23:02:14</div>
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Kode Produk</label>
                            <select name="id_produk" class="form-control" id="produk">
                                <option value="">---- Pilih Produk ----</option>
                                @foreach ($produks as $produk)
                                    <option value="{{ $produk->id }}">{{ $produk->kode_produk }} | {{ $produk->nama_produk }}</option>
                                @endforeach
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Nama Produk</label>
                            <select name="nama_produk" id="nama_produk" class="form-control" disabled></select>
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Harga Produk</label>
                            <select name="harga" id="harga" class="form-control" disabled></select>
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Qty</label>
                            <input type="number" name="qty" class="form-control" id="qty" aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text"><b>Contoh Value :</b> 5</div>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h5 class="fw-bold">Total Bayar :</h5>
                        <h3 class="fw-bold text-end" id="total_bayar"></h3>
                        <input type="hidden" name="total_bayar" id="total" value="">
                    </div>
                    <div class="col-md-6">
                        <div class="d-grid gap-2 d-flex justify-content-end">
                            <button class="btn btn-primary btn-lg" type="submit">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</script>
<!-- ============================================================== -->
@endsection

@push('script')
<script>
    $(document).ready(function() {
    $('#produk').on('change', function() {
        var produkID = $(this).val();
        if(produkID) {
            $.ajax({
                url: '/getProduk/'+produkID,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}"},
                dataType: "json",
                success:function(data)
                {
                    if(data){
                        $('#nama_produk').empty();
                        $('#nama_produk').append('<option hidden>---- Pilih Kode Produk ----</option>');
                        $.each(data, function(key, nama_produk){
                            $('select[name="nama_produk"]').append('<option value="'+ key +'" selected>' + nama_produk.nama_produk+ '</option>');
                        });
                    }else{
                        $('#nama_produk').empty();
                    }
                }
            });
        }else{
            $('#nama_produk').empty();
        }
    });
    });
</script>
<script>
    $(document).ready(function() {
    $('#produk').on('change', function() {
        var produkID = $(this).val();
        if(produkID) {
            $.ajax({
                url: '/getProduk2/'+produkID,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}"},
                dataType: "json",
                success:function(data)
                {
                    if(data){
                        $('#harga').empty();
                        $('#harga').append('<option hidden>---- Pilih Kode Produk ----</option>');
                        $.each(data, function(key, harga){
                            $('select[name="harga"]').append('<option value="'+ harga.harga +'" selected>' + harga.harga+ '</option>');
                        });
                    }else{
                        $('#harga').empty();
                    }
                }
            });
        }else{
            $('#harga').empty();
        }
    });
    });
</script>
<script>
    $(document).ready(function() {
        $("#harga, #qty").keyup(function() {
            var total = 0;
            var x     = Number($("#harga").val());
            var y     = Number($("#qty").val());
            var total = x * y;

            $('#total_bayar').text("Rp. " + total);

            document.getElementById("total").value = total

            console.log(x)
            console.log(y)
            console.log(total)
        });
    });
</script>
@endpush
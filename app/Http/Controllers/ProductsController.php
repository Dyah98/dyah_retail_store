<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.product.index', [
            'title' => 'Produk Toko',
            'produks' => Products::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nomor = random_int(1000, 9999);
        $kode_produk = 'PRD - ' . $nomor;
        return view('dashboard.product.create', [
            'title' => 'Tambah Produk',
            'kode_produk' => $kode_produk
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kode_produk' => 'required|unique:products',
            'nama_produk' => 'required',
            'harga'       => 'required'
        ]);

        Products::create($validateData);
        
        return redirect('/produk/create')->with('success', 'Produk Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.product.edit', [
            'title' => 'Edit Produk',
            'produk' => Products::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductsRequest  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'harga'       => 'required'
        ]);

        Products::where('id', $id)->update($validateData);

        return redirect('/produk')->with('success-edit', 'Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::destroy($id);

        return redirect('/produk')->with('destroy', 'Produk berhasil dihapus');
    }
}

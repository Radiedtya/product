<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{
    // menampilkan halaman product
    public function products(): View
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    // menampilkan form tambah product
    public function tambah(): View
    {
        return view('products-tambah');
    }

    // tambah product
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
        ]);
        
        Product::create($request->only(['name','description','price','stock']));
        return redirect('/products')->with('success','Product berhasil ditambahkan');
    }

    // menampilkan form ubah product
    public function edit($id): View
    {
        $product = Product::findOrFail($id);
        return view('products-edit', compact('product'));
    }

    // ubah product
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only(['name','description','price','stock']));
        return redirect('/products')->with('success','Product berhasil diubah');
    }

    // hapus product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products')->with('success','Product berhasil dihapus');
    }
}

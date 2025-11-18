<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDF;
use App\Models\Order;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Product List';

        // Menggunakan raw SQL query untuk mengambil data produk
        $products = DB::select('SELECT * FROM products');

        return view('product.index', [
            'pageTitle' => $pageTitle,
            'products' => $products,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Product';
        return view('product.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Pesan Validasi
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka',
            'image.required' => 'Gambar produk harus diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'File harus berformat jpg, png, atau jpeg.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
        ];

        // Validasi Data
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ], $messages);

        // Jika Validasi Gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Upload Image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName(); // Menggunakan nama unik untuk file
            $image->move(public_path('images/products'), $imageName); // Menyimpan di public/images/products
        } else {
            return redirect()->back()->withErrors(['image' => 'Gambar produk harus diunggah.'])->withInput();
        }


        // Simpan ke Database
        Product::create([
            'image' => 'images/products/' . $imageName, // Simpan path relatif
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);


        // Redirect dengan Pesan Sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Product Detail';
        // ELOQUENT
        $product = Product::find($id);
        return view('product.show', compact('pageTitle', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Produk';
        // ELOQUENT
        $product = Product::find($id);
        return view('product.edit', compact(
            'pageTitle',
            'product'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Temukan produk berdasarkan ID
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan.');
        }

        // Menangani upload gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            // Upload gambar baru
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->move(public_path('images/products'), $imageName);

            // Simpan path gambar baru
            $product->image = 'images/products/' . $imageName;
        }

        // Update data produk
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        // Redirect dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //QUERY BUILDER
        DB::table('products')
            ->where('id', $id)
            ->delete();
        return redirect()->route('products.index');
    }
}
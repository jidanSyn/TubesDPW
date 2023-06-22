<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        return;
        // Validasi input jika diperlukan
        $request->validate([
            'product_id' => 'required|exists:products,id',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);
    
        // Ambil data produk yang dipilih
        $product = Product::findOrFail($request->product_id);
    
        // Simpan ID produk yang dipilih ke dalam session
        $selectedProducts = $request->session()->get('selected_products', []);
        if (in_array($product->id, $selectedProducts)) {
            // Jika produk sudah dipilih, batalkan pemilihan
            $selectedProducts = array_diff($selectedProducts, [$product->id]);
        } else {
            // Jika belum dipilih, tambahkan ke daftar produk yang dipilih
            $selectedProducts[] = $product->id;
        }
        $request->session()->put('selected_products', $selectedProducts);
    
        // Redirect atau berikan respon sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Transaksi berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}

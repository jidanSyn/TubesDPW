<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Product;
use App\Models\Pembayaran;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showProducts()
    {
        $products = Product::all(); // Mengambil data game dari model Game atau menggunakan query lainnya
        return view('product', compact('products'));
    }

    public function index(Game $game)
    {
        // session(['selectedProductGame' => $game]);
        $products = Product::where('game_id', $game->id)->get();
        $games = Game::all();
        $pembayaran = Pembayaran::all();
        return view('product', compact('products', 'games', 'game', 'pembayaran'));
    }

    // public function index(Game $game)
    // {
    //     $products = Product::where('game_id', $game->id)->get();
    //     $games = Game::all();
    //     $selectedProducts = session('selectedProducts', []);
    //     return view('product', compact('products', 'games', 'game', 'selectedProducts'));
    // }


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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        return request()->all();
    }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'uid_game' => 'required',
    //         'topup' => 'required',
    //         'pembayaran' => 'required',
    //     ]);
        
    //     dd('berhas');
    // }
    // public function store(StoreProductRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

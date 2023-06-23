<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('admin');
        return view('admin.games.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->authorize('admin');
        $selectedGame = $request->session()->get('selectedProductGameAdmin', '');

        // return dd($prevGame->slug);
        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'foto' => 'image|file|max:2048',
            'harga' => 'required|between:0,99.99'
        ]);
        
        $validatedData['game_id'] = $selectedGame->id;  // menentukan produk game apa berdasarkan terpilih dari details

        $slug = SlugService::createSlug(Product::class, 'slug', $request->name);
        $validatedData['slug'] = $slug;
        
        $newFotoName = $slug . '.' . $request->file('foto')->getClientOriginalExtension();
        request()->file('foto')->storeAs('assets/img',$newFotoName,['disk' => 'public']); 
        $validatedData['foto'] = $newFotoName;
          
        Product::create($validatedData);

        // Game::where('id', $product->id)->update($validatedData);
        
        return redirect("/admin/games/$selectedGame->slug")->with('success', 'New product listing has been added.');
    }

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
        // return "hello";
        $this->authorize('admin');
        
        return view('admin.games.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $this->authorize('admin');

        $selectedGame = $request->session()->get('selectedProductGameAdmin', '');

        // return dd($prevGame->slug);
        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'foto' => 'image|file|max:2048',
            'harga' => 'required|between:0,99.99'
        ]);

        $validatedData['game_id'] = $selectedGame->id;

        if($request->name !== $product->name) {
            $slug = SlugService::createSlug(Product::class, 'slug', $request->name);
        } else {
            $slug = $product->slug;
        }

        $validatedData['slug'] = $slug;

        if($request->file('foto') !== null) {
            // return "in photo";
            Storage::disk('public')->delete("assets/img/$product->foto");
            $newFotoName = $slug . '.' . $request->file('foto')->getClientOriginalExtension();
            request()->file('foto')->storeAs('assets/img',$newFotoName,['disk' => 'public']); 
            $validatedData['foto'] = $newFotoName;
        }

        
        Product::where('id', $product->id)->update($validatedData);
        
        return redirect("/admin/games/$selectedGame->slug")->with('success', 'Product listing has been updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('admin');
        // dd($product);
        //
        // $selectedGame = request()->session()->get('selectedProductGameAdmin', '');
        // dd($selectedGame);
        if($product->foto) {
            Storage::disk('public')->delete("assets/img/$product->foto");
        }

        Product::destroy($product->id);

        return redirect('/admin/games/')->with('success', 'Product listing has been deleted');
    }
}

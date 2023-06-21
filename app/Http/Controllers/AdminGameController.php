<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.games.index', [
            'games' => Game::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'foto' => 'image|file|max:2048',
            'banner' => 'image|file|max:2048',

        ]);
        $slug = SlugService::createSlug(Game::class, 'slug', $request->name);

        $newFotoName = $slug . '.' . $request->file('foto')->getClientOriginalExtension();
        request()->file('foto')->storeAs('assets/img',$newFotoName,['disk' => 'public']); 
        $newBannerName = $slug . '-banner.' . $request->file('banner')->getClientOriginalExtension();
        request()->file('banner')->storeAs('assets/img',$newBannerName,['disk' => 'public']); 


        
        
        $validatedData['slug'] = $slug;
        $validatedData['foto'] = $newFotoName;
        $validatedData['banner'] = $newBannerName;
        // dd($validatedData);
        Game::create($validatedData);
        // $banner = request()->file('banner')->store('assets/img', ['disk' => 'public']);

        return redirect('/admin/games')->with('success', 'New game has been added.');


        // return $request->file('foto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        // ddd($game);
        // return "hello";
        // dd($game);
        session(['selectedProductGameAdmin' => $game]);

        return view('admin.games.products.index', [
            'game' => $game,
            'products' => Product::where('game_id', $game->id)->get()
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
        // ddd($game);
        return view('admin.games.edit', ['game' => $game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'foto' => 'image|file|max:2048',
        //     'banner' => 'image|file|max:2048',

        // ]);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'foto' => 'image|file|max:2048',
            'banner' => 'image|file|max:2048',
        ]);

        // belum validasi

        if($request->name !== $game->name) {
            
            $slug = SlugService::createSlug(Game::class, 'slug', $request->name);
        } else {
            $slug = $game->slug;
        }

        if($request->file('foto') !== null) {
            // return "in photo";
            Storage::disk('public')->delete("assets/img/$game->foto");
            $newFotoName = $slug . '.' . $request->file('foto')->getClientOriginalExtension();
            request()->file('foto')->storeAs('assets/img',$newFotoName,['disk' => 'public']); 
            $validatedData['foto'] = $newFotoName;
        }

        if($request->file('banner') !== null) {
            // return "in banner";
            Storage::disk('public')->delete("assets/img/$game->banner");
            $newBannerName = $slug . '-banner.' . $request->file('banner')->getClientOriginalExtension();
            request()->file('banner')->storeAs('assets/img',$newBannerName,['disk' => 'public']);         
            $validatedData['banner'] = $newBannerName;
        }

        // return "no in";
        
        $validatedData['slug'] = $slug;
        
        // dd($validatedData);
        Game::where('id', $game->id)->update($validatedData);
        // $banner = request()->file('banner')->store('assets/img', ['disk' => 'public']);

        return redirect('/admin/games')->with('success', 'New game has been added.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
        if($game->foto) {
            Storage::disk('public')->delete("assets/img/$game->foto");
        }

        if($game->banner) {
            Storage::disk('public')->delete("assets/img/$game->banner");
        }

        Product::where('game_id', $game->id)->delete();
        Game::destroy($game->id);

        return redirect('/admin/games')->with('success', 'Game has been deleted');

    }

    
}

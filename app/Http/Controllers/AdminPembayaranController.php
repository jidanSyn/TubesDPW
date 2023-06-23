<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;


class AdminPembayaranController extends Controller
{
    protected $routeKeyName = 'pembayaran';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('admin');
        return view('admin.payments.index', ['payments' => Pembayaran::all()]);
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
        return view('admin.payments.create');
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'foto' => 'image|file|max:2048'
        ]);

        $slug = SlugService::createSlug(Pembayaran::class, 'slug', $request->name);

        $newFotoName = $slug . '.' . $request->file('foto')->getClientOriginalExtension();
        request()->file('foto')->storeAs('assets/img',$newFotoName,['disk' => 'public']);

        $validatedData['slug'] = $slug;
        $validatedData['foto'] = $newFotoName;

        Pembayaran::create($validatedData);

        return redirect('/admin/payments')->with('success', 'New payment method has been added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
        $this->authorize('admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
        $this->authorize('admin');
        // dd($pembayaran);
        
        return view('admin.payments.edit', ['pembayaran' => $pembayaran ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
        $this->authorize('admin');
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'foto' => 'image|file|max:2048'
        ]);

        if($request->name !== $pembayaran->name) {
            $slug = SlugService::createSlug(Pembayaran::class, 'slug', $request->name);
        } else {
            $slug = $pembayaran->slug;
        }

        if($request->file('foto') !== null) {
            Storage::disk('public')->delete("assets/img/$pembayaran->foto");
            $newFotoName = $slug . '.' . $request->file('foto')->getClientOriginalExtension();
            request()->file('foto')->storeAs('assets/img',$newFotoName,['disk' => 'public']); 
            $validatedData['foto'] = $newFotoName;
        
        }


        $validatedData['slug'] = $slug;
        

        Pembayaran::where('id', $pembayaran->id)->update($validatedData);

        return redirect('/admin/payments')->with('success', 'Payment method has been updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
        // ddd($pembayaran);
        $this->authorize('admin');

        if($pembayaran->foto) {
            Storage::disk('public')->delete("assets/img/$pembayaran->foto");
        }

        Pembayaran::destroy($pembayaran->id);

        return redirect('/admin/payments')->with('success', 'Payment method has been deleted');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRankingController extends Controller
{
    //
    public function games() {
        $this->authorize('admin');
        $query = DB::table('games')
        ->select('games.*', 'products.id', 'transactions.id', DB::raw('COUNT(*) as jumlah_transaksi_per_game'))
        ->join('products', 'games.id', '=', 'products.game_id')
        ->join('transactions', 'products.id', '=', 'transactions.product_id')
        ->groupBy('games.id')
        ->orderByDesc('jumlah_transaksi_per_game')
        ->get();

        return view('admin.rankings.gameleaderboard', ['games' => $query]);

    }
    public function products() {
        $this->authorize('admin');
        $query = DB::table('games')
        ->select('games.id', 'products.*', 'transactions.id', DB::raw('COUNT(*) as jumlah_transaksi_per_product'))
        ->join('products', 'games.id', '=', 'products.game_id')
        ->join('transactions', 'products.id', '=', 'transactions.product_id')
        ->groupBy('products.id')
        ->orderByDesc('jumlah_transaksi_per_product')
        ->get();

        return view('admin.rankings.productleaderboard', ['products' => $query]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function view()
    {

        $this->authorize('admin');

        // $all = Transaction::join('products', 'products.id', '=', 'transactions.product_id')->get();
                // ->join('products', 'transactions.product_id', '=', 'product.id')
                // ->join('games', 'products.game_id', '=', 'games.id')
                // ->select('transactions.*')
                // ->get();
        // $query = DB::table('games')
        // ->select('games.id', 'games.name', 'products.*', 'transactions.*', DB::raw('COUNT(*) as jumlah_transaksi_per_game'))
        // ->join('products', 'games.id', '=', 'products.game_id')
        // ->join('transactions', 'products.id', '=', 'transactions.product_id')
        // ->groupBy('games.id', 'games.name', 'products.id', 'products.column1', 'products.column2', 'transactions.id', 'transactions.column1', 'transactions.column2')
        // ->orderByDesc('jumlah_transaksi_per_game')
        // ->get();

        $query = DB::table('games')
        ->select('games.*', 'products.id', 'transactions.id', DB::raw('COUNT(*) as jumlah_transaksi_per_game'))
        ->join('products', 'games.id', '=', 'products.game_id')
        ->join('transactions', 'products.id', '=', 'transactions.product_id')
        ->groupBy('games.id')
        ->orderByDesc('jumlah_transaksi_per_game')
        ->get();

        $query2 = DB::table('games')
        ->select('games.id', 'products.*', 'transactions.id', DB::raw('COUNT(*) as jumlah_transaksi_per_product'))
        ->join('products', 'games.id', '=', 'products.game_id')
        ->join('transactions', 'products.id', '=', 'transactions.product_id')
        ->groupBy('products.id')
        ->orderByDesc('jumlah_transaksi_per_product')
        ->get();


        $transactionCount = Transaction::count();
        // ddd($query->first());
        
        return view('admin.index', [
            'user_count' => count(User::all()),
            'best_game' => $query->first(),
            'best_product' => $query2->first(),
            'transaction_count' => $transactionCount,
            'revenue' => Transaction::all()->sum('harga')
        ]);

        
    }

    public function viewTransactions() {
        $this->authorize('admin');
        $query = DB::table('transactions')
        ->select('transactions.id', 'transactions.uid_game', 'users.name as namaUser', 'pembayarans.name as namaPembayaran', 'products.name as namaProduct', 'transactions.harga', 'transactions.purchased_on')
        ->join('products', 'products.id', '=', 'transactions.product_id')
        ->join('pembayarans', 'pembayarans.id', '=', 'transactions.pembayaran_id')
        ->join('users', 'users.id', '=', 'transactions.user_id')
        ->orderByDesc('transactions.purchased_on')
        ->paginate(25);

        return view('admin.transactions', [
        
        'transactions' => $query,
        ]);
    }
}

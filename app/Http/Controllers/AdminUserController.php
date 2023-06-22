<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{

    public function index()
    {
        $users = User::all(); // Mengambil data game dari model Game atau menggunakan query lainnya

        return view('admin.users.index', compact('users'));
    }
    
    public function updateIsAdmin(Request $request, User $username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->is_admin = 1;
        $user->save();

        return redirect()->back()->with('success', 'User berhasil diubah menjadi admin.');
    }


}

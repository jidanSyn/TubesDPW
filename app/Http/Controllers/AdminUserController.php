<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{

    public function index()
    {
        $this->authorize('admin');
        $users = User::all(); // Mengambil data game dari model Game atau menggunakan query lainnya

        return view('admin.users.index', compact('users'));
    }
    
    public function updateIsAdmin(Request $request, User $user)
    {
        $this->authorize('admin');
        $adminStatus["is_admin"] = 1;
        // $user = User::where('id', $user->id);
        // $user->is_admin = 1;
        // $user->save();
        User::where('id', $user->id)->update($adminStatus);

        return redirect()->back()->with('success', 'User berhasil diubah menjadi admin.');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view()
    {
        $this->authorize('admin');
        return view('admin.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->email, Auth::user()->password, Auth::id(), Auth::check());

        return view('admin.dashboard');
    }
}

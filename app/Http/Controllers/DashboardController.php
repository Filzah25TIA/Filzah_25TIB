<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return view('admin.dashboard');
        }   //Redirect ke halaman login
        return redirect()->route('login');
    }
}

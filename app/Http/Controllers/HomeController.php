<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype === 'user') 
            {
                return view('dashboard'); // Ensure this view exists

            } elseif ($usertype === 'admin') 
            {
                return view('admin.adminhome'); // Ensure this view exists
            } 
            else {
                return redirect()->back()->with('error', 'Unauthorized access');
            }
        }

        return redirect()->route('login');
    }
}

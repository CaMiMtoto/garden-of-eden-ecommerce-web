<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home',['categories'=>Category::all()]);
    }
    public function dashboard ()
    {
        return view('admins.dashboard');
    }
}

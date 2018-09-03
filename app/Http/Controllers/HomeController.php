<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy("id", "desc")->get();
        return view('home', ['categories' => $categories]);
    }

    public function dashboard()
    {
        return view('admins.dashboard');
    }
}

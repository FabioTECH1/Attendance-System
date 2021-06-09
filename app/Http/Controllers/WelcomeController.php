<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $categories = Category::where('user_id', $request->user()->id)->get();
        return view('welcome', [
            'categories' => $categories,
        ]);
    }
}
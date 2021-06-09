<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        // get from session
        $selectCategory = $request->session()->get('categoryValue');
        $catIds = Category::where('category', $selectCategory)->where('user_id', $request->user()->id)->get();
        return view('home', [
            'catIds' => $catIds,
        ]);
    }
}
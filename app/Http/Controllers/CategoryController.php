<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request, Category $category)
    {
        $request->validate([
            'category' => 'required',
        ]);
        $request->user()->categories()->create([
            'category' => Request('category'),
        ]);
        return back()->with('msge-1', 'Category added successfully. Select category below to proceed');
    }
    public function getCategory(Request $request)
    {
        $selectCategory = $request->selcategory;
        // starts a session
        $request->session()->put('categoryValue', $selectCategory);
        return redirect()->route('home');
    }
}
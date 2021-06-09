<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Category;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $selectCategory = $request->session()->get('categoryValue');
        $catIds = Category::where('category', $selectCategory)->where('user_id', $request->user()->id)->get();
        foreach ($catIds as $catId) {
            $catId = $catId->id;
        }
        $attendees = Attendee::where('category_id', $catId)->where('user_id', $request->user()->id)->orderby('attendee', 'asc')->get();
        $no = 1;
        return view('list', [
            'attendees' => $attendees,
            'no' => $no,
            'catIds' => $catIds,
        ]);
    }
}
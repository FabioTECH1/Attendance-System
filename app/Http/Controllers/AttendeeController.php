<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Category;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AttendeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $selectCategory = $request->session()->get('categoryValue');
        $catIds = Category::where('category', $selectCategory)->where('user_id', $request->user()->id)->get();
        return view('add', [
            'catIds' => $catIds,
        ]);
    }
    public function store(Category $category, Request $request)
    {
        // $weekMap = [
        //     0 => 'SUN',
        //     1 => 'MON',
        //     2 => 'TUE',
        //     3 => 'WED',
        //     4 => 'THU',
        //     5 => 'FRI',
        //     6 => 'SAT',
        // ];
        // $dayOfTheWeek = Carbon::now()->dayOfWeek;
        // $weekday = $weekMap[$dayOfTheWeek];
        // $weekday = strtoupper(today()->isoFormat('dd'));
        // $date = Carbon::now();
        // $daydate = $date->toDateString();
        // dd($daydate);

        // $tests = Attendee::where('user_id', 1)->where('category_id', 1)->get();
        $request->validate([
            'attendee' => 'required'
        ]);
        $category->attendees()->create([
            'user_id' => $request->user()->id,
            'attendee' => Request('attendee'),
        ]);
        return back()->with('msge-2', 'Name Added successfully');
    }
    public function destroy($id, Request $request)
    {
        $selectCategory = $request->session()->get('categoryValue');
        $catIds = Category::where('category', $selectCategory)->where('user_id', $request->user()->id)->get();
        foreach ($catIds as $catId) {
            $catId = $catId->id;
        }
        Attendee::where('category_id', $catId)->where('id', $id)->delete();
        return back();
    }
}
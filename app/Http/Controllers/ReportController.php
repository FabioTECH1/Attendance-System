<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Attendee;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $selectCategory = $request->session()->get('categoryValue');
        $catIds = Category::where('category', $selectCategory)->where('user_id', $request->user()->id)->get();
        return view('report', [
            'catIds' => $catIds,
        ]);
    }
    public function getReport(Request $request)
    {
        $selectCategory = $request->session()->get('categoryValue');
        $catIds = Category::where('category', $selectCategory)->where('user_id', $request->user()->id)->get();
        foreach ($catIds as $catId) {
            $catId = $catId->id;
        }
        $date = date_create(Request('date'));
        $date = date_format($date, 'Y-m-d');
        // dd($date, $catId);
        $attendance = Attendance::where('category_id', $catId)->whereDate('created_at', '=', date($date))->get();
        // dd($attendance);
        if ($attendance->count() == 0) {
            return back()->with('marked', ' ');
        }
        $date = date_create(Request('date'));
        $date = date_format($date, 'D-M-Y');
        $no = 1;
        return view('get-report', [
            'attendance' => $attendance,
            'catIds' => $catIds,
            'no' => $no,
            'date' => $date
        ]);
    }
}
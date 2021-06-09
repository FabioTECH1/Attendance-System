<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Attendee;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MarkAttendanceController extends Controller
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
        $date = Carbon::now();
        $daydate = $date->toDateString('yy', 'mm', 'dd');
        $attendance = Attendance::where('category_id', $catId)->whereDate('created_at', '=', date($daydate))->count();


        // check if attendance has been taken for the day
        if ($attendance == 0) {
            Attendee::where('category_id', $catId)->update([
                'status' => 0,
            ]);
        }
        $attendees = Attendee::where('category_id', $catId)->where('user_id', $request->user()->id)->orderby('attendee', 'asc')->get();
        $no = 1;
        return view('mark', [
            'attendees' => $attendees,
            'no' => $no,
            'catIds' => $catIds,
        ]);
    }

    public function done($id, Attendee $attendee, Request $request)
    {
        $selectCategory = $request->session()->get('categoryValue');
        $catIds = Category::where('category', $selectCategory)->where('user_id', $request->user()->id)->get();
        foreach ($catIds as $catId) {
            $catId = $catId->id;
        }
        $tocheck = Attendee::where('id', $id)->get();
        foreach ($tocheck as $checktask) {
            $attendees = $checktask->attendee;
            // dd($attendees);
            // check whether marked present (incase absent is needed)
            if ($checktask->status == 1) {
                Attendance::where('category_id', $catId)->where('user_id', $request->user()->id)->where('attendee_id', $id)->delete();
                Attendee::where('id', $id)->update([
                    'status' => 0,
                ]);
                return back();
            }
        }
        //Mark Attendance Present
        Attendance::create([
            'user_id' => $request->user()->id,
            'category_id' => $catId,
            'attendee_id' => $id,
            'attendee' => $attendees
        ]);
        Attendee::where('id', $id)->update([
            'status' => 1,
        ]);
        return back();
    }
}
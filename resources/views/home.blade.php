@extends('layout.layout')
@section('title', 'Home')

@section('content')

    <div class="container-fluid p-1" style="width: 70%">
        <div class="row my-2" style="text-align: center; margin:auto">
            <div class="col-sm-2"></div>
            <div class="col-sm-4 my-2">
                <a href="{{ route('add.attendee') }}" class="text-decoration-none">
                    <img class="img-thumbnail p-4" src='{{ asset('img/add.png') }}' alt="" style="width: 250px">
                    <h5 class="text-secondary">Add Employee/Student</h5>
                </a>
            </div>
            <div class=" col-sm-4 my-2">
                <a href="{{ route('list.attendee') }}" class="text-decoration-none">
                    <img class="img-thumbnail p-4" src='{{ asset('img/list.png') }}' alt="" style="width: 250px">
                    <h5 class="text-secondary">Employees/Students List</h5>
                </a>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row my-2" style="text-align: center;margin:auto">
            <div class="col-sm-2"></div>
            <div class="col-sm-4  my-2">
                <a href="{{ route('mark.attendee') }}" class="text-decoration-none">
                    <img class="img-thumbnail p-4" src='{{ asset('img/attendance.png') }}' alt="" style="width: 250px">
                    <h5 class="text-secondary">Mark Attendance</h5>
                </a>
            </div>
            <div class=" col-sm-4 my-2">
                <a href="{{ route('report.attendee') }}" class="text-decoration-none">
                    <img class="img-thumbnail p-4" src='{{ asset('img/report.png') }}' alt="" style="width: 250px">
                    <h5 class="text-secondary">Attendance Report</h5>
                </a>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>

@endsection

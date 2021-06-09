@extends('layout.layout')
@section('title', 'Welcome')

@section('content')
    <div class="row text-center my-5" id="add-catogory">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form action="{{ route('get.report') }}" method="post" target="_blank">
                @csrf
                <h5 class="text-start text-secondary">Choose Date</h5>
                <input class="form-control my-3 shadow-none" type="date" name="date"
                    value="<?php echo date('Y-m-d'); ?>">
                <button class=" btn btn-primary my-2 shadow-none" type="submit">Get Report</button>
            </form>
        </div>
        <div class="col-sm-4"></div>
        <a href="{{ route('mark.attendee') }}" class="text-primary text-decoration-none text-center">
            <h6>Take Attendance</h6>
        </a>
    </div>
    @if (session('marked'))
        <script>
            window.onload = function() {
                alert("No Record of Attendance for the date chosen");
            }

        </script>
    @endif

@endsection

@extends('layout.layout')
@section('title', 'Add')

@section('content')

    <div class="row text-center my-5" id="add-catogory">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            @foreach ($catIds as $catId)
                <form action="{{ route('attendee.add', $catId->id) }}" method="post">
                    @csrf
                    <input class="form-control my-3 shadow-none" type="text" name="attendee">
                    <button class="btn btn-primary my-2 shadow-none" type="submit">Add</button>
                </form>
            @endforeach
        </div>
        @error('attendee')<p class="text-danger">{{ $message }}</p>@enderror
        @if (session('msge-2'))
            <p class="text-success text-center">{{ session('msge-2') }} </p>
            <a href="{{ route('mark.attendee') }}" class="text-primary text-decoration-none text-center">
                <h6>Take Attendance</h6>
            </a>
        @endif
        <div class="col-sm-4"></div>
    </div>


@endsection

@extends('layout.layout')
@section('title', 'Mark Attendance')

@section('content')
    {{-- <div class="row text-center my-5" id="add-catogory">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form action="{{ route('marking.attendee') }}" method="post" id="myform">
                @csrf
                <h5 class="text-start text-secondary">Choose Date</h5>
                <input class="form-control my-3 shadow-none" type="date" name="date" id="datepicker">
                <input type="submit" />
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div> --}}
    <div class="container-fluid my-4" style="width: 40%;">
        <table class="table table-hover  table-info table-striped table-sm">
            <thead class="table-dark">
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>🗸</th>
                    <th>Status</th>
                </tr>
            </thead>
            @foreach ($attendees as $attendee)
                <tbody>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $attendee->attendee }}</td>
                        <td>
                            @foreach ($catIds as $catId)
                                {{ $catId->category }}
                            @endforeach
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox d-inline">
                                <form action="{{ route('attendee.mark', $attendee->id) }}" method="post"
                                    id="check{{ $attendee->id }}" class="d-inline">
                                    <input type="checkbox"
                                        onchange="document.getElementById('check{{ $attendee->id }}').submit()"
                                        class="custom-control-input text-center" @if ($attendee->status == 1) checked @endif>
                                    @csrf
                                </form>
                            </div>
                        </td>
                        @if ($attendee->status == 0)
                            <td>Absent</td>
                        @else
                            <td>Present</td>
                        @endif
                    </tr>
                </tbody>
            @endforeach

        </table>
    </div>
@endsection

@extends('layout.layout')
@section('title', 'List Attendee')

@section('content')
    <div class="container-fluid my-4" style="width: 40%;">
        <table class="table table-hover  table-info table-striped table-sm">
            <thead class="table-dark">
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Delete</th>
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
                            <form action="{{ route('attendee.delete', $attendee->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link text-decoration-none"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        <a href="{{ route('mark.attendee') }}" class="text-primary text-decoration-none text-center">
            <h6>Take Attendance</h6>
        </a>
    </div>
@endsection

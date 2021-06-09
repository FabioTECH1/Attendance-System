    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src='{{ asset('js/bootstrap.js') }}'></script>

    <div class="container-fluid my-4" style="width: 75%;" id="printpage">
        <h4 class="text-center my-2 text-info p-2">List of Available Attendees</h4>
        <h5 class="text-center my-2 text-secondary">{{ $date }}</h5>
        <table class="table table-hover  table-info table-striped table-sm">
            <thead class="table-dark">
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                </tr>
            </thead>
            @foreach ($attendance as $attendee)
                <tbody>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $attendee->attendee }}</td>
                        <td>
                            @foreach ($catIds as $catId)
                                {{ $catId->category }}
                            @endforeach
                        </td>
                        <td>Present</td>
                    </tr>
                </tbody>
            @endforeach
        </table>

    </div>
    <script type="text/javascript">
        window.onload = function() {
            window.print();
        }

    </script>

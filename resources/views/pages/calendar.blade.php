@extends('layouts.app')

@section('content')
<table>
    <thead>
        <tr>
            <th>Студент</th>
            @foreach ($dates as $date)
                <th>{{ $date }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                @foreach ($dates as $date)
                    <td>
                        @php
                            $attendance = $user->attendances->where('date', $date)->first();
                        @endphp
                        @if ($attendance)
                            отсу
                        @else
                            -
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
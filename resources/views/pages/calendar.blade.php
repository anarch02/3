@extends('layouts.app')

@section('content')
<div class="table-wrap">
    <table class="table  datatable">
        <thead>
            <tr>
                <th>Студент</th>
                @foreach ($dates as $date)
                    <th>                
                        {{ \Carbon\Carbon::parse($date)->format('d M') }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    @foreach ($dates as $date)
                        
                            @php
                                $attendance = $user->attendances->where('date', $date)->first();
                            @endphp
                            @if ($attendance)
                            <td>
                                <i class="bi bi-x-circle text-danger"></i>
                            </td>
                            @else
                            <td>
                                <i class="bi bi-circle text-success"></i>
                            </td>
                            @endif
                        
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
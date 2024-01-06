@extends('layouts.app')

@section('content')

<table>
    <thead>
        <tr>
        <th>id </th>
            <th>film name </th>
            <th>date</th>
            <th>start time</th>
            <th>hall</th>
            <th>delete</th>
            <th>update</th>

       
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
            <tr>
          
                <td>
   
   

                    @if($booking->start_date >= $currentDate && $booking->start_time >= $current_time)
                    <td><a href="{{ route('booking.Ticket', ['H_id' => $booking->H_id, 'B_id' => $booking->B_id, 'F_id' => $booking->F_id, 'SHT_id' => $booking->SHT_id, 'SH_id' => $booking->SH_id]) }}">{{ $booking->B_id }}</a></td>
                    @else
                <td>{{ $booking->B_id }}</td>
                @endif
                <td>{{ $booking->name }}</td>
              
                <td>{{ $booking->start_date}}</td>
                
                <td>{{ $booking->start_time }}</td>
                
                
                <td>{{ $booking->H_id}} </td>
               
                <td>
                    <form action="{{route('booking.delete',['B_id'=>$booking->B_id, 'F_id'=>$booking->F_id])}}" method="POST">
                    @csrf
                   @method('DELETE')
                   <button type="submit">delete</button>
                    </form>
                </td>
                <td>
                <form action="{{route('booking.edit',['B_id'=>$booking->B_id,'SHT_id'=>$booking->SHT_id,'H_id'=>$booking->H_id ,'F_id'=>$booking->F_id])}}" method="GET">
                    @csrf
                  
                   <button type="submit">update</button>
                </form>
                </td>
             
            
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index(){
        $bookings = Booking::get();
        return view ('backends.booking.index')->with('bookings', $bookings);
    }

    public function edit(Booking $booking){
        // Query database to get available table numbers
        $availableTables = [1, 2, 3, 4, 5]; // Replace with your logic
        $numGuests = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        return view('backends.booking.edit', [
            'booking' => $booking,
            'availableTables' => $availableTables,
            'numGuests' => $numGuests
        ]);
    }

    public function update(Booking $booking, Request $request){
        $bookingData = $request->all();
        $booking->update($bookingData);
        return redirect(route('backends.booking.index'));
    }
    
    // public function show(Booking $booking){
    //     return view('backends.booking.index', [
    //         'booking' => $booking
    //     ]);
    // }
    
    public function destroy(Booking $booking){
        $booking->delete();
        return redirect(route('backends.booking.index'));
    }
}

<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class ReserveController extends Controller
{
    public function my_reserve()
    {
        $authUser = Auth::user();
        $myReserves = Booking::where('user_id', $authUser->id)->get();
        return view('backends.myReserves.index', [
            'myReserves' => $myReserves
        ]);
    }
    public function edit(Booking $reserve) {
        // Query database to get available table numbers
        $availableTables = [1, 2, 3, 4, 5, 6, 7, 8, 9]; // Replace with your logic
        $numGuests = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        return view('backends.myReserves.edit', [
            'reserve' => $reserve,
            'availableTables' => $availableTables,
            'numGuests' => $numGuests
        ]);
    }
    public function update(Booking $reserve, Request $request){
        $reserveData = $request->all();
        $reserve->update($reserveData);
        return redirect(route('backends.myReserves.index'));

    }

    public function destroy(Booking $reserve){
        $reserve->delete();
        return redirect(route('backends.myReserves.index'));
    }
}
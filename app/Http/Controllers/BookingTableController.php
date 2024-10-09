<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BookingTableController extends Controller
{
    public function index() {
        return view('pages.bookingTables.index');
    }

        // public function store(Request $request)
        // {
        //     $validatedData = $request->validate([
        //         'phone_number' => 'required|string',
        //         'date' => 'required|date',
        //         'start_time' => 'required|date_format:H:i',
        //         'end_time' => 'required|date_format:H:i|after:start_time',
        //         'special_req' => 'nullable|string',
        //     ]);

        //     // dd($request->input('phone_number'));

        //     $loggedUser = Auth::user();

        //     // Create the Booking model instance
        //     $bookingData = [
        //         'user_id' => $loggedUser->id,
        //         'status' => 'pending',
        //         'phone_number' => $request->input('phone_number'),
        //         'date' => $request->input('date'),
        //        'start_time' =>$request->input('start_time'),
        //         'end_time' => $request->input('end_time'),
        //         'num_guests' => $request->input('num_guests'),
        //         'num_table' => $request->input('num_table'),
        //        'special_req' => $request->input('special_req'),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        //     Booking::create($bookingData);
        //     Session::flash('message', 'This is a message!');
        //     // Session::flash('alert-class', 'alert-danger');

        //     // Redirect to the bookings index page with a success message
        //     // return redirect()->route('backends.myReserves.index');
        //     if ($validator->fails()) {
        //         return redirect()->back()
        //             ->withErrors($validatedData)
        //             ->withInput();
        //     }
        // }
        public function store(Request $request)
        {
            // Use the validator to validate the incoming request
            $validator = Validator::make($request->all(), [
                'phone_number' => 'required|integer',
                'date' => 'required|date',
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i|after:start_time',
                'num_guests' => 'required|integer',
                'num_table' => 'required|integer',
                'special_req' => 'nullable|string',
            ]);

            // If validation fails, redirect back with errors and input
            

            // Validation passed, so prepare booking data
            $loggedUser = Auth::user();

            $bookingData = [
                'user_id' => $loggedUser->id,
                'status' => 'pending',
                'phone_number' => $request->input('phone_number'),
                'date' => $request->input('date'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'num_guests' => $request->input('num_guests'),
                'num_table' => $request->input('num_table'),
                'special_req' => $request->input('special_req'),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Create the booking record in the database
            Booking::create($bookingData);

            // Flash a success message
            Session::flash('message', 'Booking created successfully!');

            // Redirect to the bookings index page
            // return redirect()->route('backends.myReserves.index');
            return redirect()->route('backends.myReserves.index')
    ->withErrors($validator)
    ->withInput();

        }

    }


//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'phone_number' => 'required|string',
//             'date' => 'required|date',
//             'start_time' => 'required|date_format:H:i',
//             'end_time' => 'required|date_format:H:i|after:start_time',
//             'no_table' => 'required|integer',
//             'special_req' => 'nullable|string',
//         ]);

//         $user = Auth::user();

//         $bookingData = [
//             'user_id' => $user->id,
//             'status' => 'pending',
//         ];

//         $booking = Booking::create($bookingData);

//         BookingDetail::create([
//             'booking_id' => $booking->id,
//             'phone_number' => $validatedData['phone_number'],
//             'date' => $validatedData['date'],
//             'start_time' => $validatedData['start_time'],
//             'end_time' => $validatedData['end_time'],
//             'no_table' => $validatedData['no_table'],
//             'special_req' => $validatedData['special_req'],
//         ]);

//         return redirect()->route('bookingTables.index')->with('success', 'Booking created successfully!');
//     }

//     public function update(Request $request, Booking $booking)
//     {
//         $validatedData = $request->validate([
//             'phone_number' => 'required|string|max:15',
//             'num_table' => 'required|integer',
//             'date' => 'required|date',
//             'start_time' => 'required|date_format:H:i',
//             'end_time' => 'required|date_format:H:i|after:start_time',
//             'special_req' => 'nullable|string|max:255',
//         ]);

//         if (Auth::id() !== $booking->user_id) {
//             return redirect()->route('bookingTables.index')->withErrors('You are not allowed to update this booking.');
//         }

//         $booking->update($validatedData);
//         return redirect()->route('bookingTables.index')->with('success', 'Booking updated successfully!');
//     }

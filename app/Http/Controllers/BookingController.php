<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Field;
use App\Models\User;
use App\Notifications\EmailNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('booking.booking_list', [
            'title' => 'Booking',
            'rents' => Booking::with(['field', 'service', 'user'])->paginate(5)
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.booking_add', [
            'title'     => 'Booking Service',
            'mainTitle' => 'Booking',
            'fields' => Field::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //email TO nya dari sini
        $users = User::where('usertype', 'Admin')->get();
        $rent = new Booking();
        $rent->field_id = $request->input('fieldId');
        $rent->service_id = $request->input('serviceId');
        $rent->user_id = auth()->user()->id;
        $rent->book_date = $request->input('bookDate');
        $rent->status = 'Pending';
        $rent->keterangan = 'Pending';
        $rent->description = $request->input('description');
        $rent->save();
        Notification::send($users, new EmailNotification($rent));
        return redirect('/booking');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking, Request $request)
    {
        // dd($request->input('status'));
        $data = Booking::find($booking -> id);
        // dd($data);
        $data->keterangan = $request->input('message');
        $data->save();
        return redirect('/booking');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $data = Booking::find($booking->id);
        $user = User::find($data->user_id);
        $data->status = $request->input('status');
        $data->keterangan = $request->input('message');
        $data->save();
        Notification::send($user, new EmailNotification($data));
        return response()->json(
            [
              'success' => true,
              'status' => 200
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}

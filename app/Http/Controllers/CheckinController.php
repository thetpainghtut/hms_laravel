<?php

namespace App\Http\Controllers;

use App\Checkin;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Type;
use App\Room;
use App\Guest;
use DateTime;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkins = Checkin::all();
        return view('checkins.index',compact('checkins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd($request);

        $today = Carbon::now()->toDateString(); // "2020-03-21""

        $checkin = Checkin::latest()->first();

        $transaction_id=date('dmY').'0001';

        // dd($transaction_id);

        if ($checkin) {
            if ($checkin->created_at->toDateString() == $today) {
                $transaction_id = ++$checkin->transaction_id;
            }
        }

        // dd($transaction_id);
        $roomtypes = Type::all();
        return view('checkins.create',compact('transaction_id','roomtypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            "transaction_no" => "required",
            // "room_type" => "required",
            "room_no" => "required",
            "checkin" => "required",
            "checkout" => "required",
            "adult" => "required",
            "children" => "required",
            "name" => 'required',
            "contact" => 'required',
            "nrc" => 'required',
            "gender" => 'required',
            "email" => 'required',
            "address" => 'required'
        ]);

        $room = Room::where('room_number',$request->room_no)->first();

        $guest = new Guest;
        $guest->name = $request->name;
        $guest->contact = $request->contact;
        $guest->nrc = $request->nrc;
        $guest->gender = $request->gender;
        $guest->email = $request->email;
        $guest->address = $request->address;
        $guest->save();

        $checkin = new Checkin;
        $checkin->transaction_id = $request->transaction_no;
        $checkin->room_id = $room->id;
        $checkin->check_in_date = $request->checkin;
        $checkin->check_out_date = $request->checkout;
        $checkin->no_of_adults = $request->adult;
        $checkin->no_of_children = $request->children;
        $checkin->total = 0;

        // no of days calculation
        $datetime1 = new DateTime($request->checkin);
        $datetime2 = new DateTime($request->checkout);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a'); //now do whatever you like with $days
        $checkin->no_of_days = $days;
        $checkin->save();

        // Attach into checkin_guest table (pivot)
        $guest->checkins()->attach($checkin);

        // Change status in room table
        $room->status = 2;
        $room->save();

        $name = \Route::currentRouteName();
        if($name == "dashboard"){
            return back();
        }
        
        return redirect()->route('checkins.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function show(Checkin $checkin)
    {
        return view('checkins.show',compact('checkin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkin $checkin)
    {
        return view('checkins.edit',compact('checkin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkin $checkin)
    {
        $request->validate([
            "" => ""
        ]);

        return redirect()->route('checkins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkin $checkin)
    {
        $checkin->delete();

        return redirect()->route('checkins.index');
    }

    public function getTransactionId($value='')
    {
        $today = Carbon::now()->toDateString(); // "2020-03-21""

        $checkin = Checkin::latest()->first();

        $transaction_id=date('dmY').'0001';

        // dd($transaction_id);

        if ($checkin) {
            if ($checkin->created_at->toDateString() == $today) {
                $transaction_id = ++$checkin->transaction_id;
            }
        }

        return $transaction_id;
    }
}

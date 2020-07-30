<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::all();
        // return $guests;
        
        return view('guests.index',compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guests.create');
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
            "name" => 'required|min:5|max:191',
            "address" => 'required|min:10|max:191',
            "contact" => 'required|min:5|max:191',
            "email" => 'required',
            "gender" => 'required'
        ]);

        $guest = new Guest;
        $guest->name = request('name');
        $guest->address = request('address');
        $guest->contact = request('contact');
        $guest->email = request('email');
        $guest->gender = request('gender');

        $guest->save();

        return redirect()->route('guests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        return view('guests.edit',compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        $request->validate([
            "name" => 'required|min:5|max:191',
            "address" => 'required|min:10|max:191',
            "contact" => 'required|min:5|max:191',
            "email" => 'required',
            "gender" => 'required'
        ]);

        $guest->name = request('name');
        $guest->address = request('address');
        $guest->contact = request('contact');
        $guest->email = request('email');
        $guest->gender = request('gender');

        $guest->save();

        return redirect()->route('guests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        $guest->delete();

        return redirect()->route('guests.index');
    }
}

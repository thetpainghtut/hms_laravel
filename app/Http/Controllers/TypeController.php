<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use App\Service;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_types = Type::all();
        return view('roomtypes.index',compact('room_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('roomtypes.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "room_type_name" => "required|min:3"
        ]);

        $type = new Type;
        $type->name = request('room_type_name');
        $type->save();


        // Still not insert into service_type table

        return redirect()->route('roomtypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $roomtype)
    {
        return view('roomtypes.edit',compact('roomtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $roomtype)
    {
        $request->validate([
            "room_type_name" => "required|min:3"
        ]);

        $roomtype->name = request('room_type_name');
        $roomtype->save();

        return redirect()->route('roomtypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $roomtype)
    {
        $roomtype->delete();

        return redirect()->route('roomtypes.index');
    }
}

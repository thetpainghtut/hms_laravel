<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_services = Service::all();
        return view('roomservices.index',compact('room_services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomservices.create');
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
            "room_service_name" => "required|min:3",
            "room_service_icon" => "required|mimes:jpeg,bmp,png"
        ]);

        if ($request->hasfile('room_service_icon')) {
            $icon = $request->file('room_service_icon');
            $upload_dir = public_path().'/storage/services/';
            $name = time().'.'.$icon->getClientOriginalExtension();
            $icon->move($upload_dir,$name);
            $path = '/storage/services/'.$name;
        }

        $service = new Service;
        $service->name = request('room_service_name');
        $service->icon = $path;
        $service->save();

        return redirect()->route('roomservices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $roomservice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $roomservice)
    {
        return view('roomservices.edit',compact('roomservice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $roomservice)
    {
        // dd($request);

        $request->validate([
            "room_service_name" => "required|min:3",
            "room_service_icon" => "sometimes|mimes:png,PNG"
        ]);

        if ($request->hasfile('room_service_icon')) {
            $icon = $request->file('room_service_icon');
            $upload_dir = public_path().'/storage/services/';
            $name = time().'.'.$icon->getClientOriginalExtension();
            $icon->move($upload_dir,$name);
            unlink(public_path().request('oldicon'));
            $path = '/storage/services/'.$name;
        }else{
            $path = request('oldicon');
        }

        $roomservice->name = request('room_service_name');
        $roomservice->icon = $path;
        $roomservice->save();

        return redirect()->route('roomservices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $roomservice)
    {
        $roomservice->delete();

        return redirect()->route('roomservices.index');
    }
}

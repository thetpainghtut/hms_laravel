<?php

namespace App\Http\Controllers;

use App\Room;
use App\Type;
use App\Roomphoto;
use Illuminate\Http\Request;
use App\Floor;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomtypes = Type::all();
        $floors = Floor::all();

        return view('rooms.create',compact('roomtypes','floors'));
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
            "floor" => "required",
            "room_no" => "required|min:3",
            "room_photos" => "required",
            "room_photos.*" => "mimes:png,jpeg",
            "room_type" => "required",
            "room_mrate" => "required",
            "room_urate" => "required",
            // "no_of_occupancy" => "required"
        ]);

        $photo_array = array();

        if ($request->hasfile('room_photos')) {
            $photos = $request->file('room_photos');
            // dd($photos);
            $upload_dir = public_path().'/storage/rooms/';
            $i=0;
            for ($i=0; $i<count($photos);$i++) {
                $icon = $photos[$i];
                $name = time().$i.'.'.$icon->getClientOriginalExtension();
                $icon->move($upload_dir,$name);
                $path = '/storage/rooms/'.$name;
                array_push($photo_array, $path);
            }
        }

        $room = new Room;
        $room->room_number = request('room_no');
        $room->type_id = request('room_type');
        $room->mrates = request('room_mrate');
        $room->urate = request('room_urate');
        // $room->no_of_occupancy = request('no_of_occupancy');
        $room->floor_id = request('floor');
        $room->save();

        foreach ($photo_array as $value) {
            $roomphoto = new Roomphoto;
            $roomphoto->room_id = $room->id;
            $roomphoto->file_dir = $value;
            $roomphoto->save();
        }

        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $roomtypes = Type::all();
        $floors = Floor::all();

        return view('rooms.edit',compact('room','roomtypes','floors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            "room_no" => "required|min:3",
            "room_photos" => "sometimes",
            "oldphotos" => "required",
            "room_photos.*" => "mimes:png,jpeg",
            "room_type" => "required",
            "room_mrate" => "required",
            "room_urate" => "required",
            // "no_of_occupancy" => "required"
        ]);

        $photo_array = array();
        $status = 0;
        if ($request->hasfile('room_photos')) {
            $photos = $request->file('room_photos');
            // dd($photos);
            $upload_dir = public_path().'/storage/rooms/';
            $i=0;
            for ($i=0; $i<count($photos);$i++) {
                $icon = $photos[$i];
                $name = time().$i.'.'.$icon->getClientOriginalExtension();
                $icon->move($upload_dir,$name);
                $path = '/storage/rooms/'.$name;
                array_push($photo_array, $path);
            }
            $status = 1;
        }else{
            $photo_array = request('oldphotos');
        }

        $room->room_number = request('room_no');
        $room->type_id = request('room_type');
        $room->mrates = request('room_mrate');
        $room->urate = request('room_urate');
        // $room->no_of_occupancy = request('no_of_occupancy');
        $room->save();

        if ($status == 1) {
            foreach($room->photos as $photo){
                unlink(public_path().$photo->file_dir);
                $photo->delete();
            }
        }

        foreach ($photo_array as $value) {
            $roomphoto = new Roomphoto;
            $roomphoto->room_id = $room->id;
            $roomphoto->file_dir = $value;
            $roomphoto->save();
        }

        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index');
    }

    public function getRoomNo(Request $request)
    {
        $floor = $request->floor;

        $room_number = Room::where('room_number','like','%'.$floor)
                            ->orderBy('room_number','desc')    
                            ->first();

        if ($room_number) {
            $room_no = ++$room_number->room_number;
        }else{
            $room_no=$floor.'01';
        }

        return $room_no;
    }
}

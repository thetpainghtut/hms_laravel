<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Type;
use App\Floor;
use App\Checkin;
use App\Damage;
use App\Guest;

class BackendController extends Controller
{
  public function __construct($value='')
  {
    $this->middleware('myauth');
  }
  
  public function dashboard($value='')
  {
    $availables = Room::where('status',0)->get('type_id');
    $avaiarr = json_decode($availables,true);
    $avaicol = array_column($avaiarr, 'type_id');

    $books = Room::where('status',1)->get();

    $occupies = Room::where('status',2)->get('type_id');
    $occuarr = json_decode($occupies,true);
    $occucol = array_column($occuarr, 'type_id');

    $roomtypes = Type::all();
    return view('dashboard.index',compact('avaicol','occucol','books','roomtypes'));
  }

  public function checkinsDetail($id)
  {
    $checkin = Checkin::where('room_id',$id)
                        ->first();
    // dd($checkin);
    $damages = Damage::all();
    return view('dashboard.checkinsDetail',compact('checkin','damages'));
  }

  public function addInformations(Request $request)
  {
    // dd($request);

    $request->validate([
      "checkin_id" => "required",
      "name" => "required",
      "contact" => "required",
      "nrc" => "required",
      "gender" => "required",
      // "email" => "required",
      "address" => "required"
    ]);

    $guest = new Guest;
    $guest->name = $request->name;
    $guest->contact = $request->contact;
    $guest->nrc = $request->nrc;
    $guest->gender = $request->gender;
    $guest->email = $request->email;
    $guest->address = $request->address;
    $guest->save();

    $guest->checkins()->attach($request->checkin_id);

    return back();
  }

  public function checkout(Request $request)
  {
    // dd($request);
    $transaction_id = $request->checkin_transaction_id;

    $checkin = Checkin::where('transaction_id',$transaction_id)->first();
    $damages = $request->damages;

    if ($damages) {
      $checkin->damages()->attach($damages);
      $bydamages = Damage::find($damages);
    }else{
      $bydamages = Damage::find($checkin->damages);
    }

    $room = Room::find($checkin->room_id);
    $room->status = 0;
    $room->save();

    return view('dashboard.checkout',compact('checkin','bydamages'));
  }

  public function addExtraDays(Request $request)
  {
    // dd($request->no_of_day);
    $transaction_id = $request->checkin_transaction_id;
    $checkin = Checkin::where('transaction_id',$transaction_id)->first();

    $no_of_day = $request->no_of_day;
    $updateCheckoutDate = date('Y-m-d', strtotime($checkin->check_out_date. ' + '.$no_of_day.' days'));

    // Update
    $checkin->check_out_date = $updateCheckoutDate;
    $checkin->no_of_days += $no_of_day; 
    $checkin->save();

    return back();
  }
  
}

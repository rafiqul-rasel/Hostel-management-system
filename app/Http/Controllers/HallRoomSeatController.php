<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Seat;
use Illuminate\Http\Request;

class HallRoomSeatController extends Controller
{
    public function getRoomByHall(Request $id){

        if($id->has('hall_id')){
            return Room::where('hall_id',$id->input('hall_id'))->get();
        }

    }
    public function getSeatByRoom(Request $id){

        if($id->has('room_id')){
            return Seat::where('room_id',$id->input('room_id'))->where('allocate','=',0)->get();
        }

    }
}

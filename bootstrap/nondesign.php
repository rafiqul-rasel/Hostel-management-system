<?php
function get_total_halls(){
    return \App\Models\Hall::count();
}
function get_total_rooms(){
    return \App\Models\Room::count();
}
function get_total_seats(){
    return \App\Models\Seat::count();
}
function getRoomBySeat($seat_id){
    $room_name=\App\Models\Room::find(\App\Models\Seat::find($seat_id)->room_id)->name;
    return $room_name;
}
function getHallBySeat($seat_id){
    if(isset($seat_id)){
        $hall_id=\App\Models\Room::find(\App\Models\Seat::find($seat_id)->room_id)->hall_id;
        if (isset($hall_id)!=null)
        $hall_name=\App\Models\Hall::find($hall_id)->name;
        return $hall_name;
    }else{
        return null;
    }



}

function get_nameFromHallId($id){
    if(isset($id))
    return \App\Models\Hall::find($id)->name;
}
function get_nameFromRoomId($id){
    if(isset($id))
    return \App\Models\Room::find($id)->name;
}
function get_nameFromSeatId($id){
    if(isset($id))
    return \App\Models\Seat::find($id)->name;
}

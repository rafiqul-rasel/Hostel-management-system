<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Room;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halls=Hall::all();
        $rooms = Room::all();
        $seats = Seat::all();
        return view('backend.seat.index',compact('rooms','halls','seats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seat=new Seat();
        $seat->name=$request->seat;
        $seat->room_id=$request->room;
        $seat->save();
        toast('Seat created Successfully !', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function edit(Seat $seat)
    {
        $halls=Hall::all();
        $rooms=Room::all();
        $seats=Seat::all();
        $hall_id=Room::find($seat->room_id)->hall_id;
        return view('backend.seat.edit',compact('hall_id','rooms','halls','seat','seats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seat $seat)
    {
        $seat->name=$request->seat;
        $seat->room_id=$request->room;
        $seat->update();
        $room_id=Room::find($request->room);
        $room_id->hall_id=$request->hall;
        $room_id->update();
        toast('Seat Update Successfully !', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        $seat->delete();
        toast(' Seat Deleted !', 'success');
        return redirect()->back();
    }
}

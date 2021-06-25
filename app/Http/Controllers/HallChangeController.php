<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\HallApply;
use App\Models\Room;
use App\Models\Seat;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HallChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = HallApply::where('status','=',1)->latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route("dashboard.hall-change.edit",$row->id).'" class="edit btn btn-success btn-sm"> Change Seat </a>

                                            <a href="#" data-pack="'.sprintf($row->id).'"  class="delete btn btn-danger btn-sm" onclick="deleteUser(this)" data-id="1">Delete</a>

                                        </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->addColumn('name', function($row){
                    $user=User::find($row->user_id);

                    return $user->name;
                })
                ->rawColumns(['name'])

                ->escapeColumns([])
                ->make(true);
        }

        $users=User::all();
        return view('backend.hall-change.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apply=HallApply::find($id);
        $user=User::find($apply->user_id);
        $halls=Hall::all();
       // $rooms=Room::all();
       // $seats=Seat::all();
        $hall=Hall::find($apply->hall_id);
        $room=Room::find($apply->room_id);
        $seat=Seat::find($apply->seat_id);
        //return $apply;
        return view('backend.hall-change.edit',compact('apply','user','halls','hall','seat','room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $apply=HallApply::find($id);
        //update the old seat
        $old_seat=Seat::find($apply->seat_id);
        $old_seat->allocate=0;
        $old_seat->update();
        $apply->hall_id=$request->hall;
        $apply->room_id=$request->room;
        $apply->seat_id=$request->seat;
        // new seat
        $new_seat=Seat::find($request->seat);
        $new_seat->allocate=1;
        $new_seat->update();
        $apply->status=1;
        $apply->update();
        toast('Successfully Seat Change Complete!', 'success');
        return redirect()->route('dashboard.hall-change.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apply=HallApply::find($id);
        $old_seat=Seat::find($apply->seat_id);
        $old_seat->allocate=0;
        $old_seat->update();
        $apply->status=2;
        $apply->update();
        toast('Successfully Hall Allocation Deleted!', 'success');
        return 1;

    }
}

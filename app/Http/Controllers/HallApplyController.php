<?php

namespace App\Http\Controllers;

use App\Models\HallApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HallApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apply=HallApply::where('user_id','=',Auth::user()->id)->first();
       // return $apply;
        return view('backend.apply.index',compact('apply'));
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
       $apply=new HallApply();
       $apply->Student_id=$request->id;
       $apply->user_id=Auth::user()->id;
       $apply->Department=$request->department;
       $apply->CGPA=$request->cgpa;
       $apply->save();
        toast('Thanks For Aplly Hall Allocation!', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HallApply  $hallApply
     * @return \Illuminate\Http\Response
     */
    public function show(HallApply $hallApply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HallApply  $hallApply
     * @return \Illuminate\Http\Response
     */
    public function edit(HallApply $hallApply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HallApply  $hallApply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HallApply $hallApply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HallApply  $hallApply
     * @return \Illuminate\Http\Response
     */
    public function destroy(HallApply $hallApply)
    {
        //
    }
}

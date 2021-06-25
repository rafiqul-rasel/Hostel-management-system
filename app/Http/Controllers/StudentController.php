<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('type','=','student')->latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route("dashboard.student.edit",$row->id).'" class="edit btn btn-success btn-sm"> Update </a>

                                            <a href="#" data-pack="'.sprintf($row->id).'"  class="delete btn btn-danger btn-sm" onclick="deleteUser(this)" data-id="1">Delete</a>

                                        </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->addColumn('status', function($row){
                    $myroles='';
                    foreach ($row->roles as $role){
                        $myroles.=$role['name'].' ';
                    }
                    return $myroles;
                })
                ->rawColumns(['status'])
                ->escapeColumns([])
                ->make(true);
        }

        $users=User::all();
        return view('backend.student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('backend.student.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->type='student';
        $user->password=bcrypt($request->password);
        $user->save();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        toast('New student Added uccessfully', 'success');
        return redirect(route('dashboard.student.index'));
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
        $user=User::find($id);
        $roles=Role::all();
        return view('backend.student.edit',compact('user','roles'));

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
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->type='student';
        if(!is_null($request->password)){
            $user->password=bcrypt($request->password);
        }
        $user->save();
        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        toast('student Updated !', 'success');
        return redirect(route('dashboard.student.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();

        toast(' student Deleted !', 'success');
        return 1;

    }
}

@extends('backend.layout.layout')
@section('title')
    Hostel Management System
@endsection
@section('content')


    <div class="container-fluid">

        <div class="col-lg-12">
            <div class="row">
                <!-- FORM Panel -->
                <div class="col-md-4">
                    <form method="post" action="{{route("dashboard.roles.update",$role->id)}}" id="manage-deductions">
                        @csrf
                        @method('put')
                        <div class="card">
                            <div class="card-header">
                               Roles
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label class="control-label">Roles Name</label>
                                    <textarea name="role" id="" cols="30" rows="2" class="form-control" required="">{{$role->name}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Permissions</label>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                                        <label class="form-check-label" for="checkPermissionAll">Total Permissions</label>
                                    </div>
                                    <hr>
                                    @php $i = 1; @endphp
                                    @foreach ($permission_groups as $group)
                                        <div class="row">
                                            @php
                                                $permissions = App\models\User::getpermissionsByGroupName($group->name);
                                                $j = 1;
                                            @endphp

                                            <div class="col-12">
                                                <div class="form-check">
                                                     <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                                    <br>
                                                </div>
                                            </div>

                                            <div class="col-12 role-{{ $i }}-management-checkbox">

                                                @foreach ($permissions as $permission)
                                                    <div class="form-check">
                                                        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                        <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                    </div>
                                                    @php  $j++; @endphp
                                                @endforeach
                                                <br>
                                            </div>

                                        </div>
                                        @php  $i++; @endphp
                                    @endforeach



                                </div>



                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-sm-5 btn-primary "> Update</button>
                                        <a href="{{route('dashboard')}}" class="btn btn-sm-5 btn-danger col-sm-5" type="button" onclick="_reset()"> Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- FORM Panel -->

                <!-- Table Panel -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Roles</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($roles as $role)

                                <tr>
                                    <td class="text-center">{{$loop->index+1}}</td>

                                    <td class="">

                                        <p>Name: <b>{{$role->name}}</b></p>

                                    </td>
                                    <td  class="text-center">



                                                <form id="delete-user-form" action="{{ route('dashboard.roles.destroy',$role->id) }}" method="POST">
                                                    <a href="{{route('dashboard.roles.edit',$role->id)}}" class="btn btn-sm btn-primary edit_deductions" type="button" data-id="1" data-deduction="Cash Advance" data-description="Cash Advance">Update</a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button  class="btn btn-sm btn-danger delete_deductions" type="submit" data-id="1">Delete</button>

                                                </form>




                                            </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Table Panel -->
            </div>
        </div>

    </div>
@endsection

@section('style')
    <style>

        td{
            vertical-align: middle !important;
        }
        td p{
            margin: unset
        }
        img{
            max-width:100px;
            max-height:150px;
        }
    </style>
@endsection
@section('script')
   @include('backend.roles.partials.script')




@endsection

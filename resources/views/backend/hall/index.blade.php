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
                    <form method="post" action="{{route("dashboard.hall.store")}}" id="manage-deductions">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Hall name Form
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label class="control-label">Hall Name</label>
                                    <textarea name="hall" id="" cols="30" rows="2" class="form-control" required=""></textarea>
                                </div>




                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-sm-5 btn-primary "> Create Hall</button>
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
                                    <th class="text-center">Hall</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($halls as $hall)

                                <tr>
                                    <td class="text-center">{{$loop->index+1}}</td>

                                    <td class="">

                                        <p>{{$hall->name}}</b></p>

                                    </td>
                                    <td  class="text-center">



                                                <form id="delete-user-form" action="{{ route('dashboard.hall.destroy',$hall->id) }}" method="POST">
                                                    <a href="{{route('dashboard.hall.edit',$hall->id)}}" class="btn btn-sm btn-primary edit_deductions" type="button" data-id="1" data-deduction="Cash Advance" data-description="Cash Advance">Update</a>

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





@endsection

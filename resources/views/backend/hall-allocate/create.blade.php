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
                    <form method="post" action="{{route("dashboard.hall-apply.store")}}" id="manage-deductions">
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                Seat  Application Form
                            </div>
                            <div class="card-body">
                                @if($apply->status==0)
                                    <h6>Your Application Is Processing</h6>
                                @else

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Student Id</label>
                                        <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <small id="emailHelp" class="form-text text-muted">Please Enter Your University Student Id</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">CGPA</label>
                                        <input type="text" name="cgpa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <small id="emailHelp" class="form-text text-muted">Please Enter Your University CGPA</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Department</label>
                                        <select class="form-control" name="department" >

                                            <option value="CSE">CSE</option>
                                            <option value="EEE">EEE</option>
                                            <option value="ME">ME</option>

                                        </select>
                                        <small id="emailHelp" class="form-text text-muted">Please Select Your Department</small>

                                    </div>



                                @endif

                            </div>

                            @if($apply->status==0)
                            @else
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-sm-5 btn-primary "> Apply </button>
                                            <a href="{{route('dashboard')}}" class="btn btn-sm-5 btn-danger col-sm-5" type="button" onclick="_reset()"> Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>

                    </form>
                </div>
                <!-- FORM Panel -->

                <!-- Table Panel -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 align="center">Student Information</h3>
                            <table class="table">
                                <tbody>
                                <tr>

                                    <td>Name:</td>
                                    <td>{{Auth::user()->name}}</td>

                                </tr>
                                <tr>


                                    <td>Email</td>
                                    <td>{{Auth::user()->email}}</td>
                                </tr>
                                @if(isset($apply->Department))
                                    <tr>


                                        <td>Department</td>
                                        <td>{{$apply->Department}}</td>
                                    </tr>
                                @endif
                                @if(isset($apply->CGPA))
                                    <tr>


                                        <td>CGPA</td>
                                        <td>{{$apply->CGPA}}</td>
                                    </tr>
                                @endif
                                @if(isset($apply->hall_id))
                                    <tr>


                                        <td>Hall</td>
                                        <td>{{$apply->hall_id}}</td>
                                    </tr>
                                @endif
                                @if(isset($apply->room_id))
                                    <tr>


                                        <td>Room</td>
                                        <td>{{$apply->room_id}}</td>
                                    </tr>
                                @endif
                                @if(isset($apply->seat_id))
                                    <tr>


                                        <td>Seat</td>
                                        <td>{{$apply->seat_id}}</td>
                                    </tr>
                                @endif
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
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
    <script>
        $( document ).ready(function() {
            var hall=$('select[name="hall"]');
            var room=$('select[name="room"]');
            // $('#seat').hide();
            hall.change(function (){
                var s;
                var hall_id=$(this).val();
                $.get('{{url('/getroom?hall_id=')}}'+hall_id,function (data) {

                    s=' <option value="0">===Select Your Room===</option>';
                    data.forEach(function (row) {
                        s+='<option value="'+row.id+'">'+row.name+'</option>';
                    });

                    //$('#seat').show();
                    $('#room').html(s);
                });



            });
        });
    </script>




@endsection

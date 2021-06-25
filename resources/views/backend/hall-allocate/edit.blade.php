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
                    <form method="post" action="{{route("dashboard.hall-allocation.update",$apply->id)}}" id="manage-deductions">
                        @csrf
                        @method('put')
                        <div class="card">
                            <div class="card-header">
                                Hall Allocation  Form
                            </div>
                            <div class="card-body">



                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Hall</label>
                                        <select class="form-control" name="hall" >
                                            <option>===Select Your Hall===</option>
                                            @foreach($halls as $hall)
                                            <option value="{{$hall->id}}">{{$hall->name}}</option>
                                            @endforeach
                                        </select>
                                        <small id="emailHelp" class="form-text text-muted">Please Select  Hall</small>

                                    </div>
                                <div class="form-group" id="rooms">
                                    <label for="exampleFormControlSelect1">Select Room</label>
                                    <select class="form-control" id="room" name="room" >

                                    </select>
                                    <small id="emailHelp" class="form-text text-muted">Please Select Room</small>

                                </div>
                                <div class="form-group" id="seats">
                                    <label for="exampleFormControlSelect1">Select Seat</label>
                                    <select class="form-control" id="seat" name="seat" >


                                    </select>
                                    <small id="emailHelp" class="form-text text-muted">Please Select Seat</small>

                                </div>





                            </div>


                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-sm-5 btn-primary "> Allocate </button>
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
                            <h3 align="center">Student Information</h3>
                            <table class="table">
                                <tbody>
                                <tr>

                                    <td>Name:</td>
                                    <td>{{$user->name}}</td>

                                </tr>
                                <tr>


                                    <td>Email</td>
                                    <td>{{$user->email}}</td>
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
            var seat=$('select[name="seat"]');
             $('#rooms').hide();
             $('#seats').hide();
            hall.change(function (){
                var s;
                var hall_id=$(this).val();
                $.get('{{url('/getroom?hall_id=')}}'+hall_id,function (data) {

                    s=' <option value="0">===Select Your Room===</option>';
                    data.forEach(function (row) {
                        s+='<option value="'+row.id+'">'+row.name+'</option>';
                    });

                    $('#rooms').show();
                    $('#room').html(s);
                });
                //seat change by rooms
                room.change(function (){
                    var r;
                    var room_id=$(this).val();
                    if(room_id==0){
                        $('#room_area').hide();
                    }else{
                        $.get('{{url('/getseat?room_id=')}}'+room_id,function (room) {

                            r=' <option value="0">===Select Your Seat===</option>';
                            room.forEach(function (row) {
                                r+='<option value="'+row.id+'">'+row.name+'</option>';
                            });

                            $('#seats').show();
                            $('#seat').html(r);
                        });
                    }

                });


            });
        });
    </script>




@endsection

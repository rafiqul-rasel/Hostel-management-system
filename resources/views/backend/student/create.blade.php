@extends('backend.layout.layout')
@section('title')
    Add Employee Employee Management
@endsection
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <a href="{{route('dashboard.user.index')}}" class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> All User</a>
        </div>
    </div>
    <br>

    <div class="row">
        <div class=" col-lg-12">
            <div class="card">
            <div class="card-header">
                Add New student
            </div>
            <div class="card-body">
                <form method="post" action="{{route('dashboard.student.store')}}">
                    @csrf
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Name :</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="inputname">
                        </div>
                    </div>
                <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">E-mail :</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="inputemail">
                        </div>
                    </div>
        <div class=" row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">User Type :</label>
                        <div class="col-sm-10">
                            <select class="js-example-basic-multiple form-control" name="roles[]" multiple="multiple">
                             @foreach($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword"  class="col-sm-2 col-form-label">Password :</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                    </div>

              <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-lg btn-primary">Register</button>

                        </div>
                    </div>
                </form>

        </div>
        </div>
    </div>

    </div>
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    });
  </script>



@endsection

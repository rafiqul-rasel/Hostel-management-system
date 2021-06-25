@extends('backend.layout.layout')
@section('title')
    Add Hotel  Management System
@endsection
@section('content')


    <div class="row">
        <br>
        <div class="container mt-5">
            <h2 class="mb-4"> Total student List   <a href="{{route('dashboard.student.create')}}" class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> Add Student</a>
            </h2>

            <table class="table table-bordered yajra-datatable">
                <thead>
                <tr>
                    <th>Serials</th>
                    <th>Name</th>
                    <th>E-mails</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        @endsection

        @section('style')
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

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
            <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
            <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        @endsection
        @section('script')


            <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
            <script type="text/javascript">
                $(function () {

                    var table = $('.yajra-datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('dashboard.student.index') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {data: 'name', name: 'name'},
                            {data: 'email', name: 'email'},
                            {data: 'status', name: 'status'},
                            // {data: 'username', name: 'username'},
                            // {data: 'phone', name: 'phone'},
                            //  {data: 'dob', name: 'dob'},
                            {
                                data: 'action',
                                name: 'action',
                                orderable: true,
                                searchable: true
                            },
                        ]
                    });

                });
            </script>
            <script>
                function deleteUser(package) {
                    var id=package.getAttribute('data-pack');
                    console.log(id);
                    if (confirm('Do you want To Delete?')) {
                        $.ajax({
                            type: "DELETE",
                            url: 'user/' + id, //resource
                            cache: false,
                            data:{
                                _token:'{{ csrf_token() }}'
                            },
                            success: function(affectedRows) {
                                //if something was deleted, we redirect the user to the users page, and automatically the user that he deleted will disappear

                                if (affectedRows > 0) window.location = "{{route('dashboard.student.index')}}";
                            }
                        });
                    }
                }

            </script>
@endsection


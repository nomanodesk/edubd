@extends('layouts.adminlayout')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4> <a class="btn btn-gradient-primary btn-sm" href="{{ route('student_profiles.create') }}"> Add New Student</a></h4>
            </div>

        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Student List</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTables-example1">
                            <thead>
                                <tr>
                                <th>S.No</th>
                                    <th> Name </th>
                                    <th> Address </th>
                                    <th> Contact</th>
                                    <th> UID</th>
                                    <th> Image</th>
                                    <th> Action </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $applinkapp)
                                <tr>
                                    <td>{{ $applinkapp->studentName }}</td>
                                    <td>{{ $applinkapp->address }}</td>
                                    <td>{{ $applinkapp->contactNo }}</td>
                                    <td>{{ $applinkapp->uid }}</td>
                                    <td> <img src="studentImages/{{ $applinkapp->studentImage }}" height="50" width="50px"></td>
                                    <td></td>
                                    <td>
                                        <div class="dropdown dropstart">
                                            <a class="btn btn-info btn-sm, dropdown-toggle dropdown-toggle-split" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                Select
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item btn-gradient-primary btn-sm" href="{{route('institute_classes.edit',$applinkapp->id)}}">Edit Class</a></li>
                                                <li>
                                                    <form action="{{route('getsection')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="institue_class_id" value="{{$applinkapp->id}}">
                                                        <button class="dropdown-item btn-gradient-info btn-sm"> Manage Sections</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $students->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection

    <script>
        function getId(id) {
            // var id =  $(this).attr('id');
            $.ajax({
                url: "/get-base/" + id,
                method: "GET",
                success: function(data) {

                    alert(data);
                }
            });
            //  console.log(id) //displays 2

        }
    </script>
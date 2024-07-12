@extends('layouts.adminlayout')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4> <a class="btn btn-gradient-primary btn-sm" href="{{ route('institute_classes.create') }}"> Add New Class</a></h4>
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
                    <h4 class="card-title">Class List</h4>
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm" id="dataTables-example1">
                            <thead>
                                <tr> <th>#</th>
                                    <th> Name </th>
                                    <th> Level </th>
                                    
                                    <th> Action </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instituteclasses as $applinkapp)
                                <tr>
                                <td>{{ ++$i }}</td>
                                    <td>{{ $applinkapp->className }}</td>
                                    <td>{{ $applinkapp->class_level }}</td>
                                  
                                    <td>
                                        <div class="dropdown dropstart">
                                            <a class="btn btn-info btn-sm, dropdown-toggle dropdown-toggle-split" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                Select
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item btn-gradient-primary btn-sm" href="{{route('institute_classes.edit',$applinkapp->id)}}">Edit Class</a></li>
                                                <li><a class="dropdown-item btn-gradient-success btn-sm" href="{{route('institute_classes.edit',$applinkapp->id)}}">Add Student</a></li>
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
                        {!! $instituteclasses->links() !!}
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
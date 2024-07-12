@extends('layouts.adminlayout')

@section('content')
@foreach($classinfo as $data)
@endforeach
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Add Section For Class - {{$data->className}}</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form class="forms-sample" action="{{route('class_sections.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
             

                    <div class="form-group">
                        <h6 >Enter Section Name *</h6>
                        <input type="text" class="form-control" id="exampleInputName1" name='sectionName' required>
                    </div>

                    <h6>Select Class Shift *</h6>
                    <div class="col-md-8">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="class_shift" id="membershipRadios1" value="Morning" required> Morning Shift </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="class_shift" id="membershipRadios2" value="Day"> Day Shift </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6>Select Class Version *</h6>
                    <div class="col-md-8">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="class_version" id="membershipRadios1" value="Bangla" required> Bangla Version </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="class_version" id="membershipRadios2" value="English"> English Version </label>
                                </div>
                            </div>
                        </div>
                    </div>
            
                <input type="hidden" name='institue_class_id' value="{{$data->id}}">
                <div class="form-group">
                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
            </form>
        </div>
    </div>
</div>
@endsection
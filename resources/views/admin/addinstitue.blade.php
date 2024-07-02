@extends('layouts.adminlayout')

@section('content')
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Institue Data</h4>
                  
                   
                    <form class="forms-sample" action="{{route('institutions.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Institue Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name='instituteName' >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">EIIN</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" name='govtCode' >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Contact No.</label>
                        <input type="number" class="form-control" id="exampleInputPassword4" name='contactNo'placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Logo upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                         
                          <span class="input-group-append">
                          <input type="file" id="appLogo" class="form-control" name="appLogo" placeholder="Your App Logo here">
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              @endsection
@extends('layout.app')

@section('content')
<div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Investor Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="row mb-2">
                          <div class="col-auto"><img class="img-70 rounded-circle" alt="Picture" src="#"></div>
                          <div class="col">
                            <h3 class="mb-1">Shahidul Islam</h3>
                            <p class="mb-4">DESIGNER</p>
                          </div>
                        </div>
                        <div class="form-group">
                          <h6 class="form-label">Bio</h6>
                          <textarea class="form-control" rows="5">On the other hand, we denounce with righteous indignation</textarea>
                        </div>
                        <div class="form-group">
                          <label class="form-label">Email-Address</label>
                          <input class="form-control" name="email" id="email" placeholder="your-email@domain.com">
                          @if($errors->has('email'))
                            <small class="d-block text-danger">
                                {{$errors->first('email')}}
                            </small>
                        @endif
                        </div>

                        <div class="form-group">
                          <label class="form-label">Contact</label>
                          <input class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="form-footer">
                          <button class="btn btn-primary btn-block">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <form class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Edit Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label class="form-label">Investor ID</label>
                            <input class="form-control" type="number" name="investor_id" id="investor_id" placeholder="ID">
                            @if($errors->has('investor_id'))
                            <small class="d-block text-danger">
                                {{$errors->first('investor_id')}}
                            </small>
                        @endif
                          </div>
                        </div>

                        


                        <div class="col-sm-6 col-md-3">
                          <div class="form-group">
                            <label class="form-label">Number of Shares</label>
                            <input class="form-control" name="number_shares" id="number_shares" type="number" placeholder="Number">
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                          <div class="form-group">
                            <label class="form-label">Email address</label>
                            <input class="form-control" type="email" placeholder="Email">
                          </div>
                        </div>


                        <div class="col-sm-6 col-md-6">
                          <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input class="form-control" type="text" class="form-control" name="name" id="name" placeholder="Full Name">
                            @if($errors->has('name'))
                            <small class="d-block text-danger">
                                {{$errors->first('name')}}
                            </small>
                            @endif
                          </div>
                        </div>


                


                        <div class="col-sm-6 col-md-6">
                          <div class="form-group">
                            <label class="form-label">Father Name</label>
                            <input class="form-control" name="father_name" id="father_name" type="text" placeholder="Father Name">
                            @if($errors->has('father_name'))
                            <small class="d-block text-danger">
                                {{$errors->first('father_name')}}
                            </small>
                        @endif
                          </div>
                        </div>


                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-label">Address</label>
                            <input class="form-control" type="text" placeholder="Home Address">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <div class="form-group">
                            <label class="form-label">City</label>
                            <input class="form-control" type="text" placeholder="City">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                          <div class="form-group">
                            <label class="form-label">Postal Code</label>
                            <input class="form-control" type="number" placeholder="ZIP Code">
                          </div>
                        </div>


                        <div class="col-md-12">
                          <div class="form-group mb-0">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="address" rows="5" placeholder="Enter description"></textarea>
                          </div>
                        </div>



                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="submit">Update Profile</button>
                    </div>
                  </form>
                </div>







<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create New Investor</h4>
                    <p class="card-description"> Create New Investor </p>
                    <form class="forms-sample" method="post" action="{{ route ('investor.store') }}" enctype="multipart/form-data">
                    @csrf 
                  

                      <div class="form-group">
                        <label for="image">Picture</label> <br>
                        <input type="file" name="image" id="image" class="image">
                      </div>

                      

                     

                      <div class="form-group">
                        <label for="contact_no">Contact No</label>
                        <input type="number" class="form-control" name="contact_no" id="contact_no" placeholder="Contact No">
                        @if($errors->has('contact_no'))
                            <small class="d-block text-danger">
                                {{$errors->first('contact_no')}}
                            </small>
                        @endif
                      </div>

                      

                      <div class="form-group">
                        <label for="number">National ID</label>
                        <input type="number" class="form-control" name="national_id" id="national_id" placeholder="National ID">
                        @if($errors->has('national_id'))
                            <small class="d-block text-danger">
                                {{$errors->first('national_id')}}
                            </small>
                        @endif
                      </div>

                    

                      

                      <div class="form-group">
                        <label for="nominee_name">Nominee Name</label>
                        <input type="text" class="form-control" name="nominee_name" id="nominee_name" placeholder="Nominee Name">
                        @if($errors->has('nominee_name'))
                            <small class="d-block text-danger">
                                {{$errors->first('nominee_name')}}
                            </small>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="relationship">Relationship</label>
                        <input type="text" class="form-control" name="relationship" id="relationship" placeholder="Relationship">
                        @if($errors->has('relationship'))
                            <small class="d-block text-danger">
                                {{$errors->first('relationship')}}
                            </small>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="joining_date">Joining Date</label>
                        <input type="date" class="form-control" name="joining_date" id="joining_date" placeholder="Joining Date">
                        @if($errors->has('joining_date'))
                            <small class="d-block text-danger">
                                {{$errors->first('joining_date')}}
                            </small>
                        @endif
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
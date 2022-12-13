@extends('layout.app')

@section('content')
  <div class="col-12 grid-margin stretch-card">
  <div class="card">
  <div class="card-body">
    <h4 class="card-title">Update Client Profile</h4>
    <p class="card-description">Update Client Profile</p>
    <form class="forms-sample" method="post" action="{{ route ('clientInfo.update',$clientInfo->id) }}" enctype="multipart/form-data">
  @csrf 
  @method('patch')
  <div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Client Profile</h4>
                    </div>
                    <div class="card-body">
                      <div>
                      <div class="form-group">
                          <label class="form-label">Name</label>
                          <input class="form-control" value="{{$clientInfo->name}}" name="name" id="name">
                        </div>
                      <div class="form-group">
                          <label class="form-label">Image</label>
                          <input type="file" value="{{$clientInfo->image}}" class="form-control" name="image" id="image">
                        </div>
                        <div class="form-group">
                          <h6 class="form-label">Address</h6>
                          <textarea class="form-control" value="{{$clientInfo->address}}" name="address" id="address" rows="5"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <form class="card">
                    <div class="card-header">
                      <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group">
                          <label class="form-label">Email</label>
                          <input class="form-control" value="{{$clientInfo->email}}" name="email" id="email">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Contact</label>
                          <input class="form-control" value="{{$clientInfo->contact_no}}" name="contact_no" id="contact_no">
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="form-group">
                            <label class="form-label">Father Name</label>
                            <input class="form-control" value="{{$clientInfo->father_name}}"  name="father_name" id="father_name" type="text">
                          </div>
                          <div class="form-group">
                            <label class="form-label">National Id</label>
                            <input class="form-control" value="{{$clientInfo->national_id}}" name="national_id" id="national_id" type="number">
                          </div>
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
  </form>
</div>
</div>
</div>
@endsection
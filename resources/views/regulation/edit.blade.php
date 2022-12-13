@extends('layout.app')

@section('content')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Update Regulation</h4>
      <p class="card-description">Regulation</p>
      <form class="forms-sample" method="post" action="{{ route ('regulation.update',$regulation->id) }}" enctype="multipart/form-data">
      @csrf 
      @method('patch')
      <div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Regulation</h4>
                    </div>
                    <div class="card-body">
                      <div>
                      <div class="form-group">
                          <label class="form-label">Date</label>
                          <input type="date" value="{{$regulation->date}}" class="form-control" name="date" id="date">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Image</label>
                          <input type="file" value="{{$regulation->image}}" class="form-control" name="image" id="image">
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
                          <label class="form-label">Name</label>
                          <input type="text" value="{{$regulation->name}}" class="form-control" name="name" id="name">
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="form-group">
                            <label class="form-label">Remark</label>
                            <input type="text" value="{{$regulation->remark}}" class="form-control" name="remark" id="remark">
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
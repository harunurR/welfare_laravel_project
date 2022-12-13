@extends('layout.app')

@section('content')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Create Project Profile</h4>
      <p class="card-description">Project Profile</p>
      <form class="forms-sample" method="post" action="{{ route ('projectInfo.store') }}" enctype="multipart/form-data">
      @csrf 
        <div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Project Profile</h4>
                    </div>
                    <div class="card-body">
                      <div>
                      <div class="form-group">
                          <label class="form-label">Client Id</label>
                          <select name="client_id" class="form-control" id="client_id">
                          <option value="">Select Client</option>
                          @forelse($clientInfo as $m)
                            <option value="{{$m->id}}" {{old('client_id')==$m->id?"selected":""}}>{{$m->name}} - {{$m->contact_no}}</option>
                          @empty
                          <option value="">No Data Found</option>
                          @endforelse
                        </select>
                      </div>
                      <div class="form-group">
                          <label class="form-label">Project Name</label>
                          <input type="text" class="form-control" name="project_name" id="project_name">
                      </div>
                      <div class="form-group">
                          <label class="form-label">Description</label>
                          <input type="text" class="form-control" name="description" id="description">
                        </div>
                        <div class="form-group">
                          <h6 class="form-label">Amount</h6>
                          <input type="text" class="form-control" name="amount" id="amount">
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
                          <label class="form-label">Duration</label>
                          <input type="text" class="form-control" name="duration" id="duration">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Starting Date</label>
                          <input type="date" class="form-control" name="starting_date" id="starting_date">
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="form-group">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" id="end_date">
                          </div>
                          <div class="form-group">
                            <label class="form-label">Profit Projections</label>
                            <input type="number" class="form-control" name="profit_projections" id="profit_projections">
                          </div>
                          <div class="form-group">
                            <label class="form-label">Return Date</label>
                            <input type="date" class="form-control" name="return_date" id="return_date">
                          </div>
                          <div class="form-group">
                            <label class="form-label">Return Profit</label>
                            <input type="number" class="form-control" name="return_profit" id="return_profit">
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
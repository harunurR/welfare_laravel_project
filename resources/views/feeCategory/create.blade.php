@extends('layout.app')

@section('content')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create Fee Category</h4>
                    <p class="card-description">Create Fee Category</p>
                    <form class="forms-sample" method="post" action="{{ route ('feeCategory.store') }}" enctype="multipart/form-data">
                    @csrf 
                      <div class="form-group">
                        <label for="name">Name</label> <br>
                        <input type="text" name="name" id="name" class="form_control">
                      </div>
                
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
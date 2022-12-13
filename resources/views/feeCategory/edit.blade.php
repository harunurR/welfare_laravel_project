@extends('layout.app')

@section('content')

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Update Fee Category</h4>
      <p class="card-description"> Update Fee Category</p>
      <form class="forms-sample" method="post" action="{{ route ('feeCategory.update',$feeCategory->id) }}" enctype="multipart/form-data">
      @csrf 
      @method('patch')
      <input type="hidden" name="uptoken" value="{{$feeCategory->id}}">
      <div class="form-group">
          <label for="name">Name</label>
          <input type="text" value="{{$feeCategory->name}}" class="form-control" name="name" id="name" placeholder="Name">
        </div>

        <button type="submit" class="btn btn-primary mr-2">Update</button>
        <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>
@endsection
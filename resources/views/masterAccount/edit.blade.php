@extends('layout.app')

@section('content')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Update Master Account</h4>
      <p class="card-description">Update Master Account</p>
      <form class="forms-sample" method="post" action="{{ route ('masterAccount.update',$masterAccount->id) }}" enctype="multipart/form-data">
      @csrf 
      @method('patch')
      <input type="hidden" name="uptoken" value="{{$masterAccount->id}}">
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="head_name">Head Name</label>
              <input type="text" value="{{$masterAccount->head_name}}" class="form-control" id="head_name" name="head_name">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="head_code">Head Code</label>
              <input type="text" value="{{$masterAccount->head_code}}" class="form-control" id="head_code" name="head_code">
            </div>
          </div>
          
          <div class="col-sm-4">
            <div class="form-group">
              <label for="opening_balance">Opening Balance</label>
              <input type="text" value="{{$masterAccount->opening_balance}}" class="form-control" id="opening_balance" name="opening_balance">
            </div>
          </div>
        </div>
        
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>
@endsection
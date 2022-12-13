@extends('layout.app')

@section('content')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Update Sub Head List</h4>
      <p class="card-description">Update Sub Head List</p>
      <form class="forms-sample" method="post" action="{{ route ('subHead.update', $subHead->id) }}" enctype="multipart/form-data">
      @csrf 
      @method('patch')
      <input type="hidden" name="uptoken" value="{{$subHead->id}}">
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="master_head_id">Master Head</label>
              <select name="master_head_id" class="form-control" id="master_head_id">
                <option value="">Select Master Head</option>
                @forelse($master as $m)
                  <option value="{{$m->id}}">{{$m->head_name}} - {{$m->head_code}}</option>
                @empty
                <option value="">No head found</option>
                @endforelse
              </select>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="head_name">Sub Head Name</label>
              <input type="text" value="{{$subHead->head_name}}" class="form-control" id="head_name" name="head_name">
            </div>
          </div>
         
          <div class="col-sm-4">
            <div class="form-group">
              <label for="head_code">Sub Head Code</label>
              <input type="text" value="{{$subHead->head_code}}" class="form-control" id="head_code" name="head_code">
            </div>
          </div>
          
          <div class="col-sm-4">
            <div class="form-group">
              <label for="opening_balance">Opening Balance</label>
              <input type="text" value="{{$subHead->opening_balance}}" class="form-control" id="opening_balance" name="opening_balance">
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


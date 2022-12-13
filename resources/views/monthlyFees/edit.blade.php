@extends('layout.app')

@section('content')

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Update Monthly Fees</h4>
      <p class="card-description"> Update Monthly Fees</p>
      <form class="forms-sample" method="post" action="{{ route ('monthlyFees.update',$monthlyFee->id) }}" enctype="multipart/form-data">
      @csrf 
      @method('patch')
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="category_id">Category ID</label>
              <select name="category_id" class="form-control" id="category_id">
                <option value="">Select Category</option>
                @forelse($feeCategory as $m)
                  <option value="{{$m->id}}" {{old('category_id',$monthlyFee->category_id)==$m->id?"selected":""}}>{{$m->name}}</option>
                @empty
                <option value="">No head found</option>
                @endforelse
              </select>
            </div>
          </div>
          
          <div class="col-sm-6">
            <div class="form-group">
              <label for="month">Month</label> <br>
              <input type="month" name="month" value="{{old('month',$monthlyFee->month)}}" id="month" class="form-control">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="amount">Amount</label> <br>
              <input type="number" name="amount" value="{{old('amount',$monthlyFee->amount)}}" id="amount" class="form-control">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="note">Note</label> <br>
              <input type="text" name="note" value="{{old('note',$monthlyFee->note)}}" id="note" class="form-control">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Update</button>
        <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>
@endsection
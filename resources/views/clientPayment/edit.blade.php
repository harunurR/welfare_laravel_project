@extends('layout.app')

@section('content')
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Client Payment</h4>
                    <p class="card-description">Update Client Payment</p>
                    <form class="forms-sample" method="post" action="{{ route ('clientPayment.update',$clientPayment->id) }}" enctype="multipart/form-data">
                    @csrf 
                    @method('patch')
                    <input type="hidden" name="uptoken" value="{{$clientPayment->id}}">
                    <div class="row">
                    <div class="form-group">
                          <label class="form-label">Client Id</label>
                          <select name="client_id" class="form-control" id="client_id">
                          <option value="">Select Client</option>
                          @forelse($clientInfo as $m)
                          <option value="{{$m->id}}" {{old('client_id',$m->id)==$m->id?"selected":""}}>{{$m->name}} - {{$m->contact_no}}</option>
                          @empty
                          <option value="">No Data Found</option>
                          @endforelse
                        </select>
                      </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="date">Date</label>
              <input type="date" value="{{$clientPayment->date}}" class="form-control" name="date" id="date">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="method">Invest Method</label>
              <select class="form-control" name="method" id="method">
                <option value="">Select Method</option>
                  <option value="cash">Cash</option>
                  <option value="bank">Bank</option>
              </select>
            </div>
            <div class="form-group">
              <label for="invest">Invest Amount</label>
              <input type="number" class="form-control" name="invest" id="invest">
            </div>
            <div class="form-group">
              <label for="return">Return Method</label>
              <select class="form-control" name="return" id="return">
                <option value="">Select Method</option>
                  <option value="cash">Cash</option>
                  <option value="bank">Bank</option>
              </select>
            </div>
            <div class="form-group">
              <label for="amount">Amount</label>
              <input type="number" value="{{$clientPayment->amount}}" class="form-control" name="amount" id="amount">
            </div>
            <div class="form-group">
              <label for="dues">Dues</label>
              <input type="number" value="{{$clientPayment->dues}}" class="form-control" name="dues" id="dues">
            </div>
          </div>
        </div>


                    

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
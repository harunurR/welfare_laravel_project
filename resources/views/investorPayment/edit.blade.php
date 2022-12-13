@extends('layout.app')

@section('content')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Investor Payment</h4>
                    <p class="card-description">Update Investor Payment</p>
                    <form class="forms-sample" method="post" action="{{ route ('investorPayment.update',$investorPayment->id) }}" enctype="multipart/form-data">
                    @csrf 
                    @method('patch')
                    <input type="hidden" name="uptoken" value="{{$investorPayment->id}}">
                      <div class="form-group">
                        <label for="investor_id">Investor ID</label> <br>
                        <input type="number" value="{{$investorPayment->investor_id}}" name="investor_id" id="investor_id" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="name">Name</label> <br>
                        <input type="text" value="{{$investorPayment->name}}" name="name" id="name" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" value="{{$investorPayment->date}}" class="form-control" name="date" id="date">
                      </div>

                      <div class="form-group">
                        <label for="book_no">Book No</label>
                        <input type="number" value="{{$investorPayment->book_no}}" class="form-control" name="book_no" id="book_no">
                      </div>

                      <div class="form-group">
                        <label for="receipt_no">Receipt No</label>
                        <input type="number" value="{{$investorPayment->receipt_no}}" class="form-control" name="receipt_no" id="receipt_no">
                      </div>

                      <div class="form-group">
                        <label for="picture">Picture</label>
                        <input type="file" value="{{$investorPayment->picture}}" class="form-control" name="picture" id="picture">
                      </div>

                      <div class="form-group">
                        <label for="particulars">Particulars</label>
                        <input type="text" value="{{$investorPayment->particulars}}" class="form-control" name="particulars" id="particulars">
                      </div>

                      <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <input type="text" value="{{$investorPayment->payment_method}}" class="form-control" name="payment_method" id="payment_method">
                      </div>

                      <div class="form-group">
                        <label for="collection_for_month">Collection for Month</label>
                        <input type="text" value="{{$investorPayment->collection_for_month}}" class="form-control" name="collection_for_month" id="collection_for_month">
                      </div>

                      <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" value="{{$investorPayment->amount}}" class="form-control" name="amount" id="amount">
                      </div>

                      <div class="form-group">
                        <label for="per_share_amount">Per Share Amount</label>
                        <input type="number" value="{{$investorPayment->per_share_amount}}" class="form-control" name="per_share_amount" id="per_share_amount">
                      </div>

                      <div class="form-group">
                        <label for="total_deposits">Total Deposits</label>
                        <input type="number" value="{{$investorPayment->total_deposits}}" class="form-control" name="total_deposits" id="total_deposits">
                      </div>

                      <div class="form-group">
                        <label for="dues">Dues</label>
                        <input type="number" value="{{$investorPayment->dues}}" class="form-control" name="dues" id="dues">
                      </div>

                      <div class="form-group">
                        <label for="advance">Advance</label>
                        <input type="number" value="{{$investorPayment->advance}}" class="form-control" name="advance" id="advance">
                      </div>

                      <div class="form-group">
                        <label for="account_status">Account Status</label>
                        <input type="number" value="{{$investorPayment->account_status}}" class="form-control" name="account_status" id="account_status">
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
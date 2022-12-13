@extends('layout.app')

@section('content')

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Create Investor Payment</h4>
      <form class="forms-sample" method="post" action="{{ route ('investorPayment.store') }}" enctype="multipart/form-data">
      @csrf 
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="investor_id">Investor ID</label>
              <select name="investor_id" onchange="get_fees()" class="form-control" id="investor_id">
                <option value="">Select Category</option>
                @forelse($investor as $m)
                  <option value="{{$m->id}}" {{old('investor_id')==$m->id?"selected":""}}>{{$m->name}} - {{$m->contact_no}}</option>
                @empty
                <option value="">No Data Found</option>
                @endforelse
              </select>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="fees_month">Fees Month</label> <br>
              <input type="month" onchange="get_fees()" name="fees_month" id="fees_month" class="form-control">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="date">Date</label>
              <input type="date" class="form-control" name="date" id="date">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="book_no">Book No</label>
              <input type="number" class="form-control" name="book_no" id="book_no">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="receipt_no">Receipt No</label>
              <input type="number" class="form-control" name="receipt_no" id="receipt_no">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="picture">Voucher Image</label>
              <input type="file" class="form-control" name="picture" id="picture">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="payment_method">Payment Method</label>
              <select class="form-control" name="payment_method" id="payment_method">
                <option value="">Select Method</option>
                @forelse($paymethod as $pm)
                  <option value="{{$pm['id']}}-{{$pm['table_name']}}">{{$pm['head_name']}} - {{$pm['head_code']}}</option>
                @empty
                  <option value="">No Data Found</option>
                @endforelse
              </select>
            </div>
            <div class="form-group">
              <label for="totalpayable">Pay Amount</label>
              <input type="number" class="form-control" name="amount" id="totalpayable">
            </div>
          </div>
          <div class="col-sm-6">
            <table class="table">
              <tr>
                <th>On Due</th>
                <th><span class="due"></span></th>
              </tr>
              <tr>
                <th>Already Pay</th>
                <th><span class="pay_already"></span></th>
              </tr>
              <tr>
                <th>Total Fees</th>
                <th><span class="number_shares"></span> X <span class="fees"></span> = <span class="totalfees"></span></th>
              </tr>
              <tr>
                <th>Payable</th>
                <td><span class="totalpayable"></span></td>
              </tr>
            </table>
            <input type="hidden" name="number_of_share" id="number_of_share">
            <input type="hidden" name="totalpayable" id="totalpayablep">
          </div>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  function get_fees(){
    let investor_id=$('#investor_id').val();
    let fees_month=$('#fees_month').val();
    //let fees_month=$('#fees_month').val();
    
    $.ajax({
      dataType: "json",
      url: "{{route('paymentAjax')}}",
      data: {investor_id:investor_id,fees_month:fees_month},
      success: function(data){
        let totalpayable=0;
        let fees=(data.number_shares * data.fees);
        totalpayable=((fees + parseFloat(data.due)) - parseFloat(data.actual_amount));
        $('.fees').text(data.fees);
        $('.totalfees').text(fees);
        $('.due').text(data.due);
        $('.number_shares').text(data.number_shares);
        $('#number_of_share').val(data.number_shares);
        $('.pay_already').text(data.pay_already);

        $('.totalpayable').text(totalpayable);
        $('#totalpayablep').val(totalpayable);
        $('#totalpayable').val(totalpayable);
      }
    });
  }
</script>
@endpush
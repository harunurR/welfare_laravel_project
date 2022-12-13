@extends('layout.app')

@section('content')

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Create Payment</h4>
      <form class="forms-sample" method="post" action="{{ route ('clientPayment.store') }}" enctype="multipart/form-data">
      @csrf 
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label class="form-label">Client</label>
              <select name="client_id" class="form-control" onchange="project_details()" id="client_id">
                <option value="">Select Client</option>
                @forelse($clientInfo as $m)
                  <option value="{{$m->id}}" {{old('client_id')==$m->id?"selected":""}}>{{$m->name}} - {{$m->contact_no}}</option>
                @empty
                <option value="">No Data Found</option>
                @endforelse
              </select>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label class="form-label">Project</label>
              <select name="project_info_id" class="form-control" id="project_id">
                
              </select>
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
              <label for="method">Payment Method</label>
              <select class="form-control" name="method" id="method">
                <option value="">Select Method</option>
                @forelse($paymethod as $pm)
                  <option value="{{$pm['id']}}-{{$pm['table_name']}}">{{$pm['head_name']}} - {{$pm['head_code']}}</option>
                @empty
                  <option value="">No Data Found</option>
                @endforelse
              </select>
            </div>
            <div class="form-group">
              <label for="amount">Pay Amount</label>
              <input type="number" class="form-control" name="amount" id="amount">
            </div>
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
  function project_details(){
    let client_id=$('#client_id').val();
    
    $.ajax({
      dataType: "json",
      url: "{{route('project_details')}}",
      data: {client_id:client_id},
      success: function(data){
       $('#project_id').html(data);
      }
    });
  }
</script>
@endpush
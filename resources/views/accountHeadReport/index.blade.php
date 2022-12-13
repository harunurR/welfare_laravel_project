@extends('layout.app')

@section('content')

<div class="container">
    <div class="row m-3 card">
        <div class="col-12 table-responsive offset-0 card-body">
                <h3>Search Head Report</h3>
                <table class="table table-striped">
                <div class="form-group">
                          <label class="form-label">Account Head</label>
                          <select name="" class="form-control">
                          <option value="">Select Account</option>
                            <option value=""></option>
                        </select>
                </div>
                <div class="form-group">
                          <label class="form-label">Date</label>
                          <input type="date" class="form-control">
                      </div>
                </table>
                <br>

                <button class="btn btn-primary" type="submit">Get Report</button>
        </div>
    </div>
</div>
@endsection
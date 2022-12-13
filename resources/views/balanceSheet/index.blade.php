@extends('layout.app')

@section('content')

<div class="container">
    <div class="row m-3 card">
        <div class="col-12 table-responsive offset-0 card-body">
                <h3>Balance Sheet</h3>
                <table class="table table-striped">
                    <div class="form-group">
                          <label class="form-label">Year</label>
                          <select name="year" class="form-control">
                          <option value="">Select Year</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                      </div>
                </table>
                <br>
                <button class="btn btn-primary" type="submit">Get Report</button>
        </div>
    </div>
</div>
@endsection
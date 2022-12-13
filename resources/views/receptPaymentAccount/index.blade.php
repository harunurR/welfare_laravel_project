@extends('layout.app')

@section('content')

<div class="container">
    <div class="row m-3 card">
        <div class="col-12 table-responsive offset-0 card-body">
                <h3>Receipt And Payment</h3>
                <table class="table table-striped">
                
                <div class="form-group">
                          <label class="form-label">Month</label>
                          <select name="month" class="form-control">
                          <option value="">Select Month</option>
                            <option value="january">January</option>
                            <option value="february">February</option>
                            <option value="march">March</option>
                            <option value="may">May</option>
                            <option value="june">June</option>
                            <option value="july">July</option>
                            <option value="august">August</option>
                            <option value="september">September</option>
                            <option value="october">October</option>
                            <option value="november">November</option>
                            <option value="december">December</option>
                        </select>
                </div>
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
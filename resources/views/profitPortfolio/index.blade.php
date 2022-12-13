@extends('layout.app')

@section('content')

<div class="container">
    <div class="row m-3 card">
        <div class="col-12 table-responsive offset-0 card-body">
                <h3>Profit Portfolio</h3>
                <table class="table table-striped">
                <div class="form-group">
                          <label class="form-label">Investor ID</label>
                          <input type="text" class="form-control">
                      </div>
                </table>
                <br>

                <button class="btn btn-primary" type="submit">Get Report</button>
        </div>
    </div>
</div>
@endsection
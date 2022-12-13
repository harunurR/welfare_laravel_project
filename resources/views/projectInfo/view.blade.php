@extends('layout.app')

@section('content')

<div class="col-12 table-responsive grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
                <h3>Client Information</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                    </tr>

                    </thead>
                    <tbody>                     
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div>

<div class="col-12 table-responsive grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
                <h3>Project Information</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </tr>
                    
                    </thead>
                    <tbody>                     
                        <tr>
                            <td>{{$projectInfo->project?->id}}</td>
                            <td>{{$projectInfo->date}}</td>
                            <td>{{$projectInfo->amount}}</td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
@extends('layout.app')

@section('content')

<div class="col-12 table-responsive grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
                <h3>Project Information</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>date</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>


                    </thead>
                    <tbody>
                        @forelse($client_payments as $cat)
                        <tr>
                            <td>{{$cat->project_info_id}}</td>
                            <td>{{$cat->date}}</td>
                            <td>{{$cat->amount}}</td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="11">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
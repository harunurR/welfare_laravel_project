@extends('layout.app')

@section('content')

<div class="col-12 table-responsive grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
                <h3>Investor Payment</h3>
                <table class="table table-striped">
                    <a class="badge badge-success float-right" href="{{route('investorPayment.create')}}">Add Payment</a>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($investorPayment as $cat)
                        <tr>
                            <!-- <td>{{ ++$loop->index}}</td> -->
                            <td>{{$cat->investor_id}}</td>
                            <td>{{$cat->date}}</td>
                            <td>{{$cat->payment_method}}</td>
                            <td>{{$cat->amount}}</td>
                       
                            <td>
                            <a type="button" class="btn btn-sm btn-success" href="{{ route('investorPayment.show',$cat->id)}}" title="View"><i class="mdi mdi-eye"></i></a>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('investorPayment.edit',$cat->id)}}" title="Edit"><i class="mdi mdi-tooltip-edit"></i></a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="2">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
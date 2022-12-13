@extends('layout.app')

@section('content')

<div class="col-12 table-responsive grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
                <h3>Investor Payment</h3>
                <table class="table table-striped">
                    <a class="btn btn-primary float-end" href="{{route('investorPayment.create')}}">New Payment</a>
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Investor ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Book No</th>
                        <th>Receipt No</th>
                        <th>Picture</th>
                        <th>Particulars</th>
                        <th>Payment Method</th>
                        <th>Collection for Month</th>
                        <th>Amount</th>
                        <th>Per Share Amount</th>
                        <th>Total Deposits</th>
                        <th>Dues</th>
                        <th>Advance</th>
                        <th>Account Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($investorPayment as $cat)
                        <tr>
                            <td>{{ ++$loop->index}}</td>
                            <td>{{$cat->investor_id}}</td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->date}}</td>
                            <td>{{$cat->book_no}}</td>
                            <td>{{$cat->receipt_no}}</td>
                            <td><img width="50px" src="{{asset('uploads/investorPayment/'.$cat->picture)}}" alt=""></td>
                            <td>{{$cat->particulars}}</td>
                            <td>{{$cat->payment_method}}</td>
                            <td>{{$cat->collection_for_month}}</td>
                            <td>{{$cat->amount}}</td>
                            <td>{{$cat->per_share_amount}}</td>
                            <td>{{$cat->total_deposits}}</td>
                            <td>{{$cat->dues}}</td>
                            <td>{{$cat->advance}}</td>
                            <td>{{$cat->account_status}}</td>
                            <td>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('investorPayment.edit',$cat->id)}}">Edit</a>
                                <a type="button" class="btn btn-sm btn-danger" href="javascript:void()" onclick="$('#form{{$cat->id}}').submit()">Delete</a>
                                
                                <form id="form{{$cat->id}}" action="{{route('investorPayment.destroy',$cat->id)}}" method="post">
                                @csrf
                                @method('delete')
                                </form> 
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
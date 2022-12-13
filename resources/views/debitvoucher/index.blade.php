@extends('layout.app')

@section('content')

<div class="container">
    <div class="row m-3 card">
        <div class="col-12 table-responsive offset-0 card-body">
                <h3>Debit Voucher List</h3>
                <a class="badge badge-success float-right" href="{{route('drvoucher.create')}}">Create Voucher</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Voucher No</th>
                        <th>Date</th>
                        <th>Pay Name</th>
                        <th>Purpose</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($dvouchers as $cat)
                        <tr>
                            <td>{{ ++$loop->index}}</td>
                            <td>{{$cat->voucher_no}}</td>
                            <td>{{date('d/m,Y',strtotime($cat->current_date))}}</td>
                            <td>{{$cat->pay_name}}</td>
                            <td>{{$cat->purpose}}</td>
                            <td>{{$cat->debit_sum}}</td>
                            <td>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('drvoucher.edit',$cat->id)}}" title="Edit"><i class="mdi mdi-tooltip-edit"></i></a>
                                <a type="button" class="btn btn-sm btn-success" href="{{ route('drvoucher.show',$cat->id)}}" title="View"><i class="mdi mdi-eye"></i></a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="11">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $dvouchers->links() !!}
                </div>
        </div>
    </div>
</div>
@endsection
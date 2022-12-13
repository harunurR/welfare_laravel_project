@extends('layout.app')

@section('content')

<div class="col-12 table-responsive grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
                <h3>Client Payment</h3>
                <table class="table table-striped">
                    <a class="badge badge-success float-right" href="{{route('clientPayment.create')}}">Add Payment</a>
                    <thead>
                    <tr>
                        <th>Client</th>
                        <th>Project</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($clientPayment as $cat)
                        <tr>
                            <!-- <td>{{ ++$loop->index}}</td> -->
                            <td>{{$cat->client->name}}</td>
                            <td>
                                {{$cat->project->project_name}}<br>
                                <b>Duration:</b>{{$cat->project->duration}}
                            </td>
                            <td>{{$cat->date}}</td>
                            <td>{{$cat->amount}}</td>
                       
                            <td>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('clientPayment.edit',$cat->id)}}" title="Edit"><i class="mdi mdi-tooltip-edit"></i></a>
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
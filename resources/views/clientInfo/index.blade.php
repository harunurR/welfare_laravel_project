@extends('layout.app')

@section('content')

<div class="col-12 table-responsive grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
                <h3>Client List</h3>
                <table class="table table-striped">
                    <a class="badge badge-success float-right" href="{{route('clientInfo.create')}}">New Client</a>
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($clientInfo as $cat)
                        <tr>
                            <td>{{ ++$loop->index}}</td>
                            <td><img width="50px" src="{{asset('public/uploads/clientInfo/'.$cat->image)}}" alt=""></td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->contact_no}}</td>
                            <td>{{$cat->address}}</td>
                            <td>
                                <a type="button" class="btn btn-sm btn-success" href="{{ route('clientInfo.show',$cat->id)}}" title="View"><i class="mdi mdi-eye"></i></a>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('clientInfo.edit',$cat->id)}}" title="Edit"><i class="mdi mdi-tooltip-edit"></i></a>
                            </td>
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
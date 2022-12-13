@extends('layout.app')

@section('content')

<div class="col-12 table-responsive grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
                <h3>Investor Information</h3>
                <table class="table table-striped">
                    <a class="badge badge-success float-right" href="{{route('investor.create')}}">Add New</a>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>NOS</th>
                        <th>Joining</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($investor_information as $cat)
                        <tr>
                            <td>{{$cat->investor_id}}</td>
                            <td><img width="50px" src="{{asset('public/uploads/investor/'.$cat->image)}}" alt=""></td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->contact_no}} <br> {{$cat->email}}</td>
                            <td>{{$cat->number_shares}}</td>
                            <td>{{$cat->joining_date}}</td>
                            <td>
                                @if($cat->status)
                                    <sapn class="badge badge-success">Active</sapn>    
                                @else
                                    <sapn class="badge badge-danger">Inactive</sapn>
                                @endif    
                            </td>
                            <td>
                                <a type="button" class="btn btn-sm btn-success" href="{{ route('investor.show',$cat->id)}}" title="View"><i class="mdi mdi-eye"></i></a>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('investor.edit',$cat->id)}}" title="Edit"><i class="mdi mdi-tooltip-edit"></i></a>
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
                    {!! $investor_information->links() !!}
                </div>
        </div>
    </div>
</div>
@endsection
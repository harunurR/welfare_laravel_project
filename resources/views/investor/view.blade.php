@extends('layout.app')

@section('content')

<div class="col-12 table-responsive grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
                <h3>Investor Information</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Contact</th>
                        <th>National Id</th>
                        <th>Address</th>
                        <th>NOS</th>
                        <th>Nominee Name</th>
                        <th>Relationship</th>
                        <th>Joining</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>


                    </thead>
                     <tbody>
                        @if($investor_information->count() > 0)
                        <tr>
                            <td>{{$investor_information->id}}</td> 
                            <td><img width="50px" src="{{ asset('public/uploads/investor/'.$investor_information->image)}}" alt=""></td>
                            <td>{{$investor_information->name}}</td>
                            <td>{{$investor_information->father_name}}</td>
                            <td>{{$investor_information->contact_no}} <br> {{$investor_information->email}}</td>
                            <td>{{$investor_information->national_id}}</td>
                            <td>{{$investor_information->address}}</td>
                            <td>{{$investor_information->number_shares}}</td>
                            <td>{{$investor_information->nominee_name}}</td>
                            <td>{{$investor_information->relationship}}</td>
                            <td>{{$investor_information->joining_date}}</td> 
                            <td>
                                @if($investor_information->status)
                                    <sapn class="badge badge-success">Active</sapn>    
                                @else
                                    <sapn class="badge badge-danger">Inactive</sapn>
                                @endif    
                            </td>
                    
                                <td colspan="11">No data found</td>
                            </tr>
                        @endif
                    </tbody> 
                </table>
        </div>
    </div>
</div>
@endsection
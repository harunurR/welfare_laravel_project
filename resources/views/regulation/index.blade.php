@extends('layout.app')

@section('content')

<div class="col-12 table-responsive grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
                <h3>Regulation List</h3>
                <table class="table table-striped">
                    <a class="badge badge-success float-right" href="{{route('regulation.create')}}">New Regulation</a>
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Remark</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($regulation as $cat)
                        <tr>
                            <td>{{ ++$loop->index}}</td>
                            <td>{{$cat->date}}</td>
                            <td>{{$cat->name}}</td>
                            <td><img width="50px" src="{{asset('public/uploads/regulation/'.$cat->image)}}" alt=""></td>
                            <td>{{$cat->remark}}</td>
                            <td>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('regulation.edit',$cat->id)}}" title="Edit"><i class="mdi mdi-tooltip-edit"></i></a>
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
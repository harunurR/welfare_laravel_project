@extends('layout.app')

@section('content')

<div class="col-12 table-responsive grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
                <h3>Fee Category</h3>
                <table class="table table-striped">
                    <a class="badge badge-success float-right" href="{{route('feeCategory.create')}}">Add New</a>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($feeCategory as $cat)
                        <tr>
                            <td>{{ ++$loop->index}}</td>
                            <td>{{$cat->name}}</td>
                            <td>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('feeCategory.edit',$cat->id)}}" title="Edit"><i class="mdi mdi-tooltip-edit"></i></a>
                                <a type="button" class="btn btn-sm btn-danger" href="javascript:void()" onclick="$('#form{{$cat->id}}').submit()"><i class="mdi mdi-delete"></i></a>
                                
                                <form id="form{{$cat->id}}" action="{{route('feeCategory.destroy',$cat->id)}}" method="post">
                                @csrf
                                @method('delete')
                                </form> 
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
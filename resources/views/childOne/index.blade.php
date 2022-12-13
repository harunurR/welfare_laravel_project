@extends('layout.app')

@section('content')

<div class="container">
    <div class="row m-3 card">
        <div class="col-12 table-responsive offset-0 card-body">
                <h3>Child One List</h3>
                <table class="table table-striped">
                    <a class="badge badge-success float-right" href="{{route('childOne.create')}}">Add New</a>
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Sub Head</th>
                        <th>Child One</th>
                        <th>Opening Balance</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($childOne as $cat)
                        <tr>
                            <td>{{ ++$loop->index}}</td>
                            <td>{{$cat->subhead?->head_name}} - {{$cat->subhead?->head_code}}</td>
                            <td>{{$cat->head_name}} - {{$cat->head_code}}</td>
                            <td>{{$cat->opening_balance}}</td>
                            <td>
                            <a type="button" class="btn btn-sm btn-primary" href="{{ route('childOne.edit',$cat->id)}}" title="Edit"><i class="mdi mdi-tooltip-edit"></i></a>

                            <a type="button" class="btn btn-sm btn-danger" href="javascript:void()" onclick="$('#form{{$cat->id}}').submit()"><i class="mdi mdi-delete"></i></a>
                                
                                <form id="form{{$cat->id}}" action="{{route('childOne.destroy',$cat->id)}}" method="post">
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
                <div class="d-flex justify-content-center">
                    {!! $childOne->links() !!}
                </div>
        </div>
    </div>
</div>
@endsection
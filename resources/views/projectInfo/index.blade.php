@extends('layout.app')

@section('content')

<div class="col-12 table-responsive grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
                <h3>Project List</h3>
                <table class="table table-striped">
                    <a class="badge badge-success float-right" href="{{route('projectInfo.create')}}">New Project</a>
                    <thead>
                    <tr>
                        <th>Client ID</th>
                        <th>Project Name</th>
                        <th>Amount</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($projectInfos as $projectInfo)
                        <tr>
                            <!-- <td>{{ ++$loop->index}}</td> -->
                            <td>{{$projectInfo->client_id}}</td>
                            <td>{{$projectInfo->project_name}}</td>
                            <td>{{$projectInfo->amount}}</td>
                            <td>{{$projectInfo->duration}}</td>
                            <td>
                                @if($projectInfo->status)
                                    <sapn class="badge badge-success">Active</sapn>    
                                @else
                                    <sapn class="badge badge-danger">Inactive</sapn>
                                @endif    
                            </td>
                            <td>
                                <a type="button" class="btn btn-sm btn-success" href="{{ route('projectInfo.show',$projectInfo)}}" title="View"><i class="mdi mdi-eye"></i></a>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('projectInfo.edit',$projectInfo->id)}}" title="Edit"><i class="mdi mdi-tooltip-edit"></i></a>
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
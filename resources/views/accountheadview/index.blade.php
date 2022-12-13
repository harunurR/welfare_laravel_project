@extends('layout.app')

@section('content')

<div class="container">
    <div class="row m-3 card">
        <div class="col-12 offset-0 card-body">
            <h3>Account Head View</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Master Head</th>
                    <th>Sub Head</th>
                    <th>Child One</th>
                    <th>Child Two</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($master_head as $mhead) <!-- master head loop -->
                        @if($mhead->subhead)
                            <tr>
                                <td>{{$mhead->head_name}} - {{$mhead->head_code}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach($mhead->subhead as $subhead) <!-- sub head loop -->
                                @if($subhead->childOne)
                                    <tr>
                                        <td></td>
                                        <td>{{$subhead->head_name}} - {{$subhead->head_code}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @foreach($subhead->childOne as $childOne) <!-- child one head loop -->
                                        @if($childOne->childTwo)
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>{{$childOne->head_name}} - {{$childOne->head_code}}</td>
                                                <td></td>
                                            </tr>
                                            @foreach($childOne->childTwo as $childTwo) <!-- child two head loop -->
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{$childTwo->head_name}} - {{$childTwo->head_code}}</td>
                                            </tr>
                                            @endforeach <!-- /child two head loop -->
                                        @endif
                                    @endforeach <!-- /child one head loop -->
                                @endif
                            @endforeach <!-- /sub head loop -->
                        @endif

                    @empty
                        <tr>
                            <td colspan="4">No data found</td>
                        </tr>
                    @endforelse <!-- /master head loop -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
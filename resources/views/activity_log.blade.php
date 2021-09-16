@extends('layouts.app')

@section('content')
    <div class="aiz-main-content">
        <div class="px-15px px-lg-25px">
            <div class="aiz-titlebar text-left mt-2 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="h3">All Activities</h1>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0 h6">Activities</h5>
                    <form class="" id="sort_categories" action="" method="GET">
                        <div class="box-inline pad-rgt pull-left">
                            <div class="" style="min-width: 200px;">
                                <input type="text" class="form-control" id="search" name="search"
                                       placeholder="Type name & Enter">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table aiz-table mb-0">
                        <thead>
                        <tr>
                            <th data-breakpoints="lg">#</th>
                            <th data-breakpoints="lg">Date/Time</th>
                            <th data-breakpoints="lg">User</th>
                            <th data-breakpoints="lg">Event Type</th>
                            <th data-breakpoints="lg">Message</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activities as $key => $activity)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ date('d-M-Y H:i:s', strtotime($activity->created_at)) }}</td>
                                <td>{{$activity->causer->name}}</td>
                                <td>{{$activity->log_name}}</td>
                                <td id="msg">{{$activity->description}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="aiz-pagination">
                        {{ $activities->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


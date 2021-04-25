@extends('layouts.app')
@section('title','Student Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    Hello {{Auth::guard('student')->user()->name}}, You Are Login As Student
                    <hr>
                    @include('student.profile')

                    <h3>My Schedule And Mark</h3>
                    <hr>
                    <table class="table table-bordered" id="tabel-data">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Course</th>
                                <th>Teacher Name</th>
                                <th>Room</th>
                                <th>First</th>
                                <th>Mid</th>
                                <th>Final</th>
                            </tr>
                        </thead>
                        @if(count($schedules)<1)
                            <tr>
                                <td colspan="7">No Data Found</td>
                            </tr>
                        @else
                        <tbody>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td>{{$schedule->time}}</td>
                                    <td>{{$schedule->course->name}}</td>
                                    <td>{{$schedule->teacher->name}}</td>
                                    <td>{{$schedule->room->name}}</td>
                                    <td>{{$schedule->first??0}}</td>
                                    <td>{{$schedule->mid??0}}</td>
                                    <td>{{$schedule->final??0}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#tabel-data').DataTable();
        });
    </script>
@endpush


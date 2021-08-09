@extends('layouts.app')
@section('title',$class->name)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Daftar Siswa</h4>
                            <hr>
                            <table class="table table-bordered" id="tabel-data">
                                <thead>
                                    <tr>
                                        <th>NIS</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($class->student as $student)
                                    <tr>
                                        <td>{{$student->student_id_second}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->email}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h4>Jadwal Pelajaran</h4>
                            <hr>
                            <table class="table table-bordered" id="tabel-data">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Course</th>
                                        <th>Teacher</th>
                                        <th>Room</th>
                                    </tr>
                                </thead>
                                @if(count($class->schedules)<1)
                                    <tr>
                                        <td colspan="5">No Data Found</td>
                                    </tr>
                                @else
                                <tbody>
                                    @foreach($class->schedules as $schedule)
                                        <tr>
                                            <td>{{$schedule->time}}</td>
                                            <td>{{$schedule->course->name}}</td>
                                            <td>{{$schedule->teacher->name}}</td>
                                            <td>{{$schedule->room->name}}</td>
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

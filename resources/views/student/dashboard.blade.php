@extends('layouts.app')
@section('title','Student Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    {{-- Hello {{Auth::guard('student')->user()->name}}, You Are Login As Student
                    <hr> --}}
                    @include('student.profile')

                    @if($tab=='nilai')
                    <h3>Nilai</h3>
                    <br>
                    <table class="table table-bordered" id="tabel-data">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th>Matapelajaran</th>
                                <th>Nama Guru</th>
                                <th>Nilai Pengetahuan</th>
                                <th>Nilai Keterampilan</th>
                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($scores as $score)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$score->course->name}}</td>
                                <td>{{$score->teacher->name}}</td>
                                <td>{{$score->knowledge_value}} / {{$score->knowledge_predicate}}</td>
                                <td>{{$score->skill_value}} / {{$score->skill_predicate}}</td>
                                <td>{{$score->semester}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <h3>Jadwal Pelajaran</h3>
                        <hr>
                        <table class="table table-bordered" id="tabel-data">
                            <thead>
                                <tr>
                                    <th>Jam Pelajaran</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Nama Guru</th>
                                    <th>Ruangan</th>
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
                                        <td>{{$schedule->day}}, {{$schedule->time}}</td>
                                        <td>{{$schedule->course->name}}</td>
                                        <td>{{$schedule->teacher->name}}</td>
                                        <td>{{$schedule->room->name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                    @endif
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


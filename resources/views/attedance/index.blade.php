@extends('layouts.app')
@section('title','Kelola Kehadiran')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td width="200">Mata Pelajaran</td>
                            <td>{{$curiculum->course_name}}</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>{{$curiculum->student_class_name}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    <a href="/attedance/create?course_id={{$curiculum->course_id}}&teacher_id={{$curiculum->teacher_id}}" class="btn btn-primary">Input Kehadiran</a>
                    <a  class="btn btn-primary" href="/my-schedule?tab=kehadiran">Kembali</a>
                    <hr>
                    @include('alert')
                    <table class="table table-bordered" id="tabel-data">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                @for($i=1;$i<=$jumlahKehadiran;$i++)
                                <th><a href="/attedance/{{ Request::segment(2) }}/edit?pertemuan_ke={{$i}}&id={{ Request::segment(2) }}">Ke-{{$i}}</a></th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($curiculum->students as $student)
                            <tr>
                                <td>{{$student->student_id_second}}</td>
                                <td>{{$student->name}}</td>
                                @for($i=1;$i<=$jumlahKehadiran;$i++)
                                    <td>{{ getAttendance($student->id, $curiculum->course_id,$curiculum->teacher_id, $i) }}</td>
                                @endfor
                            </tr>
                            @endforeach
                        </tbody>
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

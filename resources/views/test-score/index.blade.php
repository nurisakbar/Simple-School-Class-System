@extends('layouts.app')
@section('title','Laporan Hasil Ujian Siswa Kelas '.$curiculum->student_class_name)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Siswa Pada Kelas {{$curiculum->student_class_name}}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="table-active">
                            <th colspan="3">Informasi Guru</th>
                        </tr>
                        <tr>
                            <td rowspan="5" width="200"><img src="{{$curiculum->teacher_photo==null?'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg':'/teacher_photo/'.$curiculum->teacher_photo}}" class="img-thumbnail" width="200"></td>
                        </tr>
                        <tr>
                            <td width="200">Course</td>
                            <td>{{$curiculum->course_name}}</td>
                        </tr>
                        <tr>
                            <td>Class</td>
                            <td>{{$curiculum->student_class_name}}</td>
                        </tr>
                        <tr>
                            <td>Teacher</td>
                            <td>{{$curiculum->teacher_name}}</td>
                        </tr>
                    </table>

                    <h5>LIST STUDENT IN CLASS {{$curiculum->student_class_name}}</h5>
                    <hr>
                    <table class="table table-bordered" id="tabel-data">
                        <thead>
                            <tr>
                                <th width="60">Photo</th>
                                <th width="100">NIS</th>
                                <th>Name</th>
                                <th>Nilai Pengetahuan</th>
                                <th>Nilai Keterampilan</th>
                                <th width="40">Semester</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($curiculum->students as $student)
                            <tr>
                                <td>
                                    <img src="{{$student->photo==null?'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg':'/student_photo/'.$student->photo}}" width="50">
                                </td>
                                <td>{{$student->student_id_second}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->knowledge_value??0}}</td>
                                <td>{{$student->skill_value??0}}</td>
                                <td>{{$student->semester??1}}</td>
                                <td>
                                    <a href="/score/create?course_id={{$curiculum->course_id}}&student_id={{$student->student_id}}&semester=1&teacher_id={{$curiculum->teacher_id}}" class="btn btn-primary">Input</a>
                                </td>
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
    <link rel="stylesheet" href="https://www.jqueryscript.net/demo/Highly-Customizable-jQuery-Toast-Message-Plugin-Toastr/build/toastr.css">
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://www.jqueryscript.net/demo/Highly-Customizable-jQuery-Toast-Message-Plugin-Toastr/toastr.js"></script>
    <script>
        $(document).ready(function(){
            $('#tabel-data').DataTable();
        });


        function saveMarkFirst(studentId,schduleId,type){
            var first = $("#mark-first-"+studentId).val();
            var mid = $("#mark-mid-"+studentId).val();
            var final = $("#mark-final-"+studentId).val();
           
            $.ajax({
                url: "/mark",
                data:{studentId:studentId,schduleId:schduleId,first:first,mid:mid,final:final},
                cache: false,
                success: function (html) {
                    toastr.success('Mark Saved')
                }
            });
        }
    </script>
@endpush

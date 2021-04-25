@extends('layouts.app')
@section('title','Mark Form')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td rowspan="5" width="200"><img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" class="img-thumbnail" width="200"></td>
                        </tr>
                        <tr>
                            <td width="200">Course</td>
                            <td>{{$schedule->course->name}}</td>
                        </tr>
                        <tr>
                            <td>Class</td>
                            <td>{{$schedule->class->name}}, Room : {{$schedule->room->name}}</td>
                        </tr>
                        <tr>
                            <td>Teacher</td>
                            <td>{{$schedule->teacher->name}}</td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td>{{$schedule->time}}</td>
                        </tr>
                    </table>

                    <h4>LIST STUDENT IN CLASS</h4>
                    <hr>
                    <table class="table table-bordered" id="tabel-data">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th width="40">First</th>
                                <th width="40">Mid</th>
                                <th width="40">Final</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{$student->student_id}}</td>
                                <td>{{$student->name}}</td>
                                <td>
                                    {!! Form::text('', $student->first, ['id'=>'mark-first-'.$student->id,'class'=>'form-control','onKeyup'=>'saveMarkFirst('.$student->id.','.$schedule->id.',1)']) !!}
                                </td>
                                <td>{!! Form::text('', $student->mid, ['id'=>'mark-mid-'.$student->id,'class'=>'form-control','onKeyup'=>'saveMarkFirst('.$student->id.','.$schedule->id.',2)']) !!}</td>
                                <td>{!! Form::text('', $student->final, ['id'=>'mark-final-'.$student->id,'class'=>'form-control','onKeyup'=>'saveMarkFirst('.$student->id.','.$schedule->id.',3)']) !!}</td>
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

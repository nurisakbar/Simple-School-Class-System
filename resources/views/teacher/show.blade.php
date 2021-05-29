@extends('layouts.app')
@section('title','Detail')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Teacher Detail</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td rowspan="3" width="200"><img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" class="img-thumbnail" width="200"></td>
                            <td>Name</td>
                            <td>{{$teacher->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$teacher->email}}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{$teacher->phone}}</td>
                        </tr>
                    </table>

                    @include('alert')

                    <div>TEACHING SCHEDULE 
                        @if(Auth::check())
                            <a style="float: right;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Add New Schedule</a>
                        @endif
                    </div>
                    <hr>
                    <table class="table table-bordered" id="tabel-data">
                        <thead>
                            <tr>
                                <th>Teaching Time</th>
                                <th>Course</th>
                                <th>Class Name</th>
                                <th>Class Room</th>
                                <th width="190">Action</th>
                            </tr>
                        </thead>
                        @if(count($teacher->schedules)<1)
                            <tr>
                                <td colspan="5">No Data Found</td>
                            </tr>
                        @else
                        <tbody>
                            @foreach($teacher->schedules as $schedule)
                                <tr>
                                    <td>{{$schedule->day.', '.$schedule->time}}</td>
                                    <td>{{$schedule->course->name}}</td>
                                    <td>{{$schedule->class->name}}</td>
                                    <td>{{$schedule->room->name}}</td>
                                    @if(Auth::check())
                                        <td>
                                            {!! Form::open(['route'=>['schedule.destroy',$schedule->id],'method'=>'delete']) !!}
                                            <button class="btn btn-primary btn-sm" type="submit">Delete</button>
                                        {!! Form::close() !!}
                                        </td>
                                    @else
                                        <td>
                                            <a href="/schedule/{{$schedule->id}}/mark" class="btn btn-success btn-sm">Kelola Nilai</a>
                                            <a href="/attedance/{{$schedule->id}}" class="btn btn-success btn-sm">Kelola Kehadiran</a>
                                        </td>
                                    @endif
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Teach Schedule</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(['route'=>'schedule.store']) !!}
        {!! Form::hidden('teacher_id', $teacher->id) !!}
        {!! Form::hidden('academic_year_id', $academicYear->id) !!}
        <div class="modal-body">
          <table class="table table-bordered">
              <tr>
                  <td>Room</td>
                  <td>{!! Form::select('room_id', $rooms, null, ['class'=>'form-control']) !!}</td>
              </tr>
              <tr>
                <td>Course</td>
                <td>{!! Form::select('course_id', $courses, null, ['class'=>'form-control']) !!}</td>
            </tr>
            <tr>
                <td>Class</td>
                <td>{!! Form::select('student_class_id', $class, null, ['class'=>'form-control']) !!}</td>
            </tr>
            <tr>
                <td>Time</td>
                <td>
                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-control" name="time">
                                @foreach($teachingTime as $time)
                                    <option value="{{$time}}">{{$time}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" name="day">
                                @foreach($days as $day)
                                    <option value="{{$day}}">{{$day}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        {!! Form::close() !!}
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


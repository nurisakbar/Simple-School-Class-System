@extends('layouts.app')
@section('title','Detail')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Detail Guru</div>

                <div class="card-body">
                    {!! Form::open(['route'=>['teacher.update',$teacher->id],'files'=>true,'method'=>'PUT']) !!}
                    {!! Form::hidden('redirect', 'my-schedule') !!}
                    <table class="table table-bordered">
                        <tr>
                        <td rowspan="5" width="200"><img src="{{$teacher->photo==null?'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg':'teacher_photo/'.$teacher->photo}}" class="img-thumbnail" width="200"></td>
                            <td>Nama</td>
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
                        <tr>
                            <td>Photo</td>
                            <td>
                                <input type="file" name="photo">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" class="btn btn-primary">Update</button></td>
                        </tr>
                    </table>
                    {!! Form::close() !!}

                    @include('alert')

                    <div>JADWAL MENGAJAR
                        @if(Auth::check())
                            <a style="float: right;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Add New Schedule</a>
                        @endif
                    </div>
                    <hr>
                    @if(isset($_GET['tab']))
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                            <a class="nav-link {{ $_GET['tab']=='jadwal'?'active':''}}" href="/my-schedule?tab=jadwal">Jadwal Mengajar</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ $_GET['tab']=='kehadiran'?'active':''}}" href="/my-schedule?tab=kehadiran">Kelola Kehadiran</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ $_GET['tab']=='nilai'?'active':''}}"" href="/my-schedule?tab=nilai">Kelola Nilai</a>
                            </li>
                        </ul>

                        <hr>
                        @if($_GET['tab']=='nilai' or $_GET['tab']=='kehadiran')
                        <table class="table table-bordered" id="tabel-data">
                            <thead>
                                <tr>
                                    <th width="10">Nomor</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th width="100">Action</th>
                                </tr>
                                <tbody>
                                    @foreach($curiculums as $curiculum)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$curiculum->course_name}}</td>
                                        <td>{{$curiculum->student_class_name}}</td>
                                        <td>
                                            @if($_GET['tab']=='nilai')
                                                <a href="/schedule/{{$curiculum->course_id}}/score?teacher_id={{$curiculum->teacher_id}}" class="btn btn-success btn-sm">Kelola Nilai</a>
                                            @else 
                                                <a href="/attedance/{{$curiculum->course_id}}?&teacher_id={{$curiculum->teacher_id}}" class="btn btn-success btn-sm">Kelola Kehadiran</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </thead>
                        </table>
                        @else
                        <table class="table table-bordered" id="tabel-data">
                            <thead>
                                <tr>
                                    <th>Jadwal Mengajar</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Nama Kelas</th>
                                    <th>Ruangan</th>
                                    @if(Auth::check())
                                    <th width="190">Action</th>
                                    @endif
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
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                        @endif
                    @else
                    <table class="table table-bordered" id="tabel-data">
                        <thead>
                            <tr>
                                <th>Jadwal Mengajar</th>
                                <th>Mata Pelajaran</th>
                                <th>Nama Kelas</th>
                                <th>Ruangan</th>
                                @if(Auth::check())
                                <th width="190">Action</th>
                                @endif
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
                                    @endif
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
                  <td>Ruangan</td>
                  <td>{!! Form::select('room_id', $rooms, null, ['class'=>'form-control']) !!}</td>
              </tr>
              <tr>
                <td>Mata pelajaran</td>
                <td>{!! Form::select('course_id', $courses, null, ['class'=>'form-control']) !!}</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>{!! Form::select('student_class_id', $class, null, ['class'=>'form-control']) !!}</td>
            </tr>
            <tr>
                <td>Waktu</td>
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
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
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


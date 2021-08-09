@extends('layouts.app')
@section('title','Form Nilai Ujian')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form Nilai Ujian</div>

                <div class="card-body">
                    @include('alert')
                    <div class="row">
                        <div class="col-md-4">
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="2">INFO SISWA</th>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <img src="{{$student->photo==null?'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg':'/student_photo/'.$student->photo}}" width="250">
                                    </td>
                                </tr>
                                <tr>
                                    <th>NIS</th>
                                    <th>{{$student->student_id_second}}</th>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <th>{!! Form::select('student', $students, $student->student_id, ['id'=>'student','class'=>'form-control','onChange'=>'changeStudent()']) !!}</th>
                                </tr>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>{{$schedule->course->name}}</th>
                                </tr>
                                <tr>
                                    <th>Nama Guru</th>
                                    <th>{{$schedule->teacher->name}}</th>
                                </tr>
                            </table>
                        </div>
                
                        <div class="col-md-8">
                            {!! Form::model($score,['url'=>'score']) !!}
                            {!! Form::hidden('schedule_id', $schedule->id) !!}
                            {!! Form::hidden('student_id', $student->id) !!}
                            {!! Form::hidden('student', $student->student_id) !!}
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="2">PENGETAHUAN</th>
                                </tr>
                                <tr>
                                    <td>NILAI & PREDIKAT</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                {!! Form::text('knowledge_value', null, ['class'=>'form-control','placeholder'=>'Nilai Pengetahuan']) !!}
                                            </div>
                                            <div class="col-md-2">
                                                {!! Form::select('knowledge_predicate', $predicate, null, ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>DESKRIPSI</td>
                                    <td>{!! Form::textarea('knowledge_description', null, ['class'=>'form-control','placeholder'=>'Deskripsi','rows'=>2]) !!}</td>
                                </tr>
                                <tr>
                                    <th colspan="2">KETERAMPILAN</th>
                                </tr>
                                <tr>
                                    <td>NILAI & PREDIKAT</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                {!! Form::text('skill_value', null, ['class'=>'form-control','placeholder'=>'Nilai Keterampilan']) !!}
                                            </div>
                                            <div class="col-md-6">
                                                {!! Form::select('skill_predicate', $predicate, null, ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>DESKRIPSI</td>
                                    <td>{!! Form::textarea('skill_description', null, ['class'=>'form-control','placeholder'=>'Deskripsi','rows'=>2]) !!}</td>
                                </tr>
                                <tr>
                                    <td>Semester</td>
                                    <td>
                                        <div class="row">
        
                                            <div class="col-md-6">
                                                {!! Form::select('semester', $semester, null, ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn btn-info">Simpan</button>
                                        <a href="/schedule/{{$schedule->id}}/score" class="btn btn-info">Kembali</a>
                                    </td>
                                </tr>
            
                            </table>
                            {!! Form::close() !!}
                        </div>
                      
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    function changeStudent()
    {
        var student_id = $("#student").val();
        var schedule_id = {{ $schedule->id}};
        //console.log(schedule_id);
        window.location.href = "/score/create?schedule_id="+schedule_id+"&student_id="+student_id;
    }
</script>
@endpush

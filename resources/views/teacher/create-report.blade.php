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
                                        <img src="https://img.icons8.com/bubbles/2x/user-male.png" width="250">
                                    </td>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <th>{{$student->student_id}}</th>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <th>{!! Form::select('student', $students, $student->student_id, ['id'=>'student','class'=>'form-control','onChange'=>'changeStudent()']) !!}</th>
                                </tr>
                            </table>
                        </div>
                
                        <div class="col-md-8">
                            {!! Form::model($examResult,['url'=>'report']) !!}
                            {!! Form::hidden('student_id', $student->id) !!}
                            {!! Form::hidden('student', $student->student_id) !!}
                            <table class="table table-bordered">
                                <tr>
                                    <td>SIKAP SPRITUAL</td>
                                    <td>{!! Form::textarea('spiritual_attitude', null, ['class'=>'form-control','placeholder'=>'Deskripsi','rows'=>2,'required'=>'required']) !!}</td>
                                </tr>
                                <tr>
                                    <td>SIKAP SOSIAL</td>
                                    <td>{!! Form::textarea('social_attitude', null, ['class'=>'form-control','placeholder'=>'Deskripsi','rows'=>2,'required'=>'required']) !!}</td>
                                </tr>
                                <tr>
                                    <td>SARAN SARAN</td>
                                    <td>{!! Form::textarea('suggestion', null, ['class'=>'form-control','placeholder'=>'Deskripsi','rows'=>2,'required'=>'required']) !!}</td>
                                </tr>
                                <tr>
                                    <td>TINGGI & BERAT BADAN</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                {!! Form::text('height', null, ['class'=>'form-control','placeholder'=>'Tinggi','required'=>'required']) !!}
                                            </div>
                                            <div class="col-md-6">
                                                {!! Form::text('weight', null, ['class'=>'form-control','placeholder'=>'Berat','required'=>'required']) !!}
                                            </div>
                                        </div>
                                    </td>
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
                                        <a href="/home-room-teacher" class="btn btn-info">Kembali</a>
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
       // var student_id = $("#student").val();
        //var schedule_id = 1;
        //console.log(schedule_id);
        //window.location.href = "/score/create?schedule_id="+schedule_id+"&student_id="+student_id;
    }
</script>
@endpush

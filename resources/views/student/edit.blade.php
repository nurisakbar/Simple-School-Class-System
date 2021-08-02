@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Data Siswa</div>

                <div class="card-body">
                    {!! Form::model($student,['route'=>['student.update',$student->id],'method'=>'PUT']) !!}
                    
                    @include('student.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title','Tambah Data Siswa')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Data Siswa</div>

                <div class="card-body">
                    {!! Form::open(['route'=>'student.store','files'=>true]) !!}
                    
                    @include('student.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

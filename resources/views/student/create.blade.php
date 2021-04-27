@extends('layouts.app')
@section('title','Create New Student')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create New Student</div>

                <div class="card-body">
                    {!! Form::open(['route'=>'student.store']) !!}
                    
                    @include('student.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

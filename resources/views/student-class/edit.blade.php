@extends('layouts.app')
@section('title','Edit Class')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    {!! Form::model($class,['route'=>['class.update','class'=>$class->id],'method'=>'put']) !!}  
                    @include('student-class.form')
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('class.index')}}" class="btn btn-primary">Cancel</a>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
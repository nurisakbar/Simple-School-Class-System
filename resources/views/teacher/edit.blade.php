@extends('layouts.app')
@section('title','Edit Teacher')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    {!! Form::model($teacher,['route'=>['teacher.update',$teacher->id],'method'=>'PUT']) !!}
                    
                    @include('teacher.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

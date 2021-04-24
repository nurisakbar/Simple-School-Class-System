@extends('layouts.app')
@section('title','Create Teacher')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    {!! Form::open(['route'=>'teacher.store']) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Teacher Name</label>
                                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Student Name']) !!}
                                @if($errors->has('name'))
                                    <small id="emailHelp" class="form-text text-muted">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Student Email']) !!}
                                @if($errors->has('email'))
                                    <small id="emailHelp" class="form-text text-muted">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                {!! Form::password('password', ['class'=>'form-control','placeholder'=>'Password']) !!}
                                @if($errors->has('password'))
                                    <small id="emailHelp" class="form-text text-muted">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('teacher.index')}}" class="btn btn-primary">Cancel</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title','Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User Profile</div>
                
                <div class="card-body">
                    @include('alert')
                    {!! Form::model($user,['route'=>'profile.update','method'=>'PUT']) !!}
                    {!! Form::hidden('id', null) !!}
                    {!! Form::hidden('role', $role) !!}
                    <table class="table table-bordered">
                        <tr>
                            <td width="200" rowspan="4"><img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" class="img-thumbnail" width="200"></td>
                            <td width="170">Name</td>
                            <td>{!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'']) !!}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'']) !!}</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>{!! Form::password('password', ['class'=>'form-control','placeholder'=>'Password']) !!}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </td>
                        </tr>
                    </table>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

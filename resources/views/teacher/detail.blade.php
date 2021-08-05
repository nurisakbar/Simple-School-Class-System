@extends('layouts.app')
@section('title','Detail')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Teacher Detail</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td rowspan="3" width="200"><img src="{{$teacher->photo==null?'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg':'/teacher_photo/'.$teacher->photo}}" class="img-thumbnail" width="200"></td>
                            <td>Name</td>
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
                        
                    </table>

                    <div class="form-group">
                        <a href="{{ route('teacher.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


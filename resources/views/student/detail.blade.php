@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Student Detail</div>

                <div class="card-body">
                    
                    <table class="table table-bordered">
                        
                        <tr>
                        <td rowspan="4" width="200"><img src="{{$student->photo==null?'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg':'/student_photo/'.$student->photo}}" class="img-thumbnail" width="200"></td>
                            <td>Nama Lengkap</td>
                            <td>{{$student->name}}</td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>{{$student->student_id}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$student->email}}</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>{{$student->class->name}}</td>
                        </tr>
                    </table>

                    <div class="form-group">
                        <a href="{{ route('student.index') }}" class="btn btn-primary">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{!! Form::open(['route'=>['student.update',$student->id],'method'=>'PUT','files'=>true]) !!}
{!! Form::hidden('redirect', 'student-dashboard') !!}
<table class="table table-bordered">
    <tr>
        <td rowspan="4" width="200"><img src="{{$student->photo==null?'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg':'/student_photo/'.Auth::guard('student')->user()->photo}}" class="img-thumbnail" width="200"></td>
        <td>Nama Lengkap</td>
        <td>{{Auth::guard('student')->user()->name}}</td>
    </tr>
    <tr>
        <td>NIS</td>
        <td>{{Auth::guard('student')->user()->student_id}}</td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>{{Auth::guard('student')->user()->class->name}}</td>
    </tr>
    <tr>
        <td>Foto</td>
        <td>
            <input type="file" name="photo">
            <button type="submit" class="btn btn-primary">Ganti Photo</button>
        </td>
    </tr>
</table>
{!! Form::close() !!}
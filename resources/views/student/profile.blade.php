<table class="table table-bordered">
    <tr>
        <td rowspan="4" width="200"><img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" class="img-thumbnail" width="200"></td>
        <td>Name</td>
        <td>{{Auth::guard('student')->user()->name}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{Auth::guard('student')->user()->email}}</td>
    </tr>
    <tr>
        <td>ID</td>
        <td>{{Auth::guard('student')->user()->student_id}}</td>
    </tr>
    <tr>
        <td>Class Name</td>
        <td>{{Auth::guard('student')->user()->class->name}}</td>
    </tr>
</table>
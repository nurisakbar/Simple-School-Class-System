@extends('layouts.app')
@section('title','Kelola Data Siswa')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    <a href="{{route('student.create')}}" class="btn btn-primary">Tambah Data</a>
                    <hr>
                    @include('alert')
                    <table class="table table-bordered" id="tabel-data">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Email</th>
                                <th width="190">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{$student->student_id}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->class->name}}</td>
                                <td>{{$student->email}}</td>
                                <td>
                                    <a href="/student/{{$student->id}}/edit" class="btn btn-primary" style="float:left;margin-right:10px;">Edit</a>
                                    <a href="/student/{{$student->id}}" class="btn btn-primary" style="float:left;margin-right:10px;">Detail</a>
                                    {!! Form::open(['route'=>['student.destroy',$student->id],'method'=>'delete']) !!}
                                        <button class="btn btn-primary" type="submit">Delete</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#tabel-data').DataTable();
        });
    </script>
@endpush

@extends('layouts.app')
@section('title','Wali Kelas')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Wali Kelas</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td rowspan="3" width="200"><img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" class="img-thumbnail" width="200"></td>
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

                    @include('alert')
                    <hr>
                    <h5>DAFTAR SISWA</h5>
                    {!! Form::open(['url'=>'home-room-teacher','method'=>'GET']) !!}
                    <table class="table table-bordered">
                        <tr>
                            <td>Pilih Semester</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::select('semester', [1=>'Semester Ganjil',2=>'Semester Genap'], null, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">Refresh</button>
                                    </div>
                                </div>
                                </td>
                        </tr>
                    </table>
                    {!! Form::close() !!}
                    <hr>
   
                    <table class="table table-bordered" id="tabel-data">
                        <thead>
                            <tr>
                                <th width="60">Photo</th>
                                <th width="100">NIDN</th>
                                <th>Name</th>
                                <th>Nilai Pengetahuan</th>
                                <th>Nilai Keterampilan</th>
                                <th width="40">Semester</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>
                                    <img src="https://img.icons8.com/bubbles/2x/user-male.png" width="50">
                                </td>
                                <td>{{$student->student_id}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->knowledge_value??0}}</td>
                                <td>{{$student->skill_value??0}}</td>
                                <td>{{$student->semester??1}}</td>
                                <td>
                                    <a href="/report?student_id={{$student->student_id}}&type=input&semester=1" class="btn btn-primary">Input Raport</a>
                                    <a href="/report?student_id={{$student->student_id}}&type=pdf&semester={{ $_GET['semester']}}" class="btn btn-primary">Lihat Raport</a>
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

<!-- Modal -->
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


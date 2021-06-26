@extends('layouts.app')
@section('title','List Teacher')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>
                <div class="card-body">
                    <a href="{{route('teacher.create')}}" class="btn btn-primary">Tambah Data Guru</a>
                    <hr>
                    @include('alert')
                    <table class="table table-bordered" id="tabel-data">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th width="140"></th>
                                <th width="190">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $teacher)
                            <tr>
                                <td>{{$teacher->name}}</td>
                                <td>{{$teacher->email}}</td>
                                <td>{{$teacher->phone}}</td>
                                <td>
                                    <a href="{{ route('teacher.show', ['teacher' => $teacher->id])  }}" class="btn btn-primary">Jadwal Mengajar</a>
                                </td>
                                <td>
                                    <a href="/teacher/{{$teacher->id}}/edit" class="btn btn-primary" style="float:left;margin-right:10px;">Edit</a>
                                    <a href="/teacher/{{$teacher->id}}/detail" class="btn btn-primary" style="float:left;margin-right:10px;">Detail</a>
                                    {!! Form::open(['route'=>['teacher.destroy',$teacher->id],'method'=>'delete']) !!}
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

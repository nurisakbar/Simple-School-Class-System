@extends('layouts.app')
@section('title','Manage Class')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    <a href="{{route('class.create')}}" class="btn btn-primary">Create New Class</a>
                    <hr>
                    @include('alert')
                    <table class="table table-bordered" id="tabel-data">
                        <thead>
                            <tr>
                                <th>Nama Kelas</th>
                                <th>Nama Walikelas</th>
                                <th>Jumlah Siswa</th>
                                <th>Jadwal</th>
                                <th width="40">Detail</th>
                                <td width="120">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classes as $class)
                            <tr>
                                <td>{{$class->name}}</td>
                                <td>{{$class->teacher->name}}</td>
                                <td>{{$class->student->count()}}</td>
                                <td>{{$class->schedules->count()}}</td>
                                <td><a href="/class/{{$class->id}}" class="btn btn-primary">Detail</a></td>
                                <td>
                                    <a href="/class/{{$class->id}}/edit" class="btn btn-primary" style="float:left;margin-right:10px;">Edit</a>
                                    {!! Form::open(['route'=>['class.destroy',$class->id],'method'=>'delete']) !!}
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

@extends('layouts.app')
@section('title','List Material')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    @if(Auth::guard('teacher')->check())
                        <a href="{{route('material.create')}}" class="btn btn-primary">Create Material</a>
                        <hr>
                    @else
                        @include('student.profile')
                        <h4>My Material</h4>
                        <hr>
                    @endif
                    @include('alert')
                    <table class="table table-bordered" id="tabel-data">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Course</th>
                                <th>Class</th>
                                <th>File</th>
                                @if(Auth::guard('teacher')->check())
                                    <th width="130"></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($materials as $material)
                            <tr>
                                <td>{{$material->title}}</td>
                                <td>{{$material->schedule->course->name}}</td>
                                <td>{{$material->schedule->class->name}}</td>
                                <td><a href="/material/{{$material->file}}/download">{{$material->file}}</a></td>
                                @if(Auth::guard('teacher')->check())
                                    <td>
                                        <a href="/material/{{$material->id}}/edit" class="btn btn-primary" style="float:left;margin-right:10px;">Edit</a>
                                        {!! Form::open(['route'=>['material.destroy',$material->id],'method'=>'delete']) !!}
                                            <button class="btn btn-primary" type="submit">Delete</button>
                                        {!! Form::close() !!}
                                    </td>
                                @endif
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

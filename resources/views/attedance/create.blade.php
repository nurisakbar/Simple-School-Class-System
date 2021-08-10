@extends('layouts.app')
@section('title','Form Input Kehadiran')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="200">Mata Pelajaran</td>
                                    <td>{{$curiculum->course_name}}</td>
                                    <input type="hidden" id="teacher_id" value="{{$curiculum->teacher_id}}">
                                    <input type="hidden" id="course_id" value="{{$curiculum->course_id}}">
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>{{$curiculum->student_class_name}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td><input type="date" id="date" name="date" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Pertemuan Ke</td>
                                    <td>
                                        <select id="pertemuan" class="form-control">
                                            @for($pertemuan=1;$pertemuan<=$jumlahKehadiran;$pertemuan++)
                                                <option value="{{$pertemuan}}">Pertemuan Ke - {{$pertemuan}}</option>
                                            @endfor
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <a href="/attedance/{{$curiculum->course_id}}?&teacher_id={{$curiculum->teacher_id}}" class="btn btn-primary">Kembali</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered" id="tabel-data">
                                <thead>
                                    <tr>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Status Kehadiran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($curiculum->students as $student)
                                    <tr>
                                        <td>{{$student->student_id_second}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{!! Form::select('', $attedanceStatus, null, ['class'=>'form-control','id'=>'student-'.$student->id,'onChange'=>'saveAttedance('.$student->id.')']) !!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            $('#tabel-data').DataTable();
        });

        function saveAttedance(id){
            var attedanceStatus = $("#student-"+id).val();
            var pertemuan       = $("#pertemuan").val();
            var date            = $("#date").val();
            var course_id       = $("#course_id").val();
            var teacher_id      = $("#teacher_id").val();
            if(date=='')
            {
                alert('Silahkan Pilih Tanggal');
                exit();
            }
            $.ajax({
                url: "/attedance/store",
                data:{student_id:id,status:attedanceStatus,meet_to:pertemuan,course_id:course_id,date:date,teacher_id:teacher_id},
                success: function (html) {
                    $("#results").append(html);
                    $.toast({
                        heading: 'Informasi',
                        text: 'Berhasil Menyimpan Riwayat Kehadiran',
                        position: 'top-right',
                        icon: 'info',
                        loader: true,        // Change it to false to disable loader
                        loaderBg: '#9EC600'  // To change the background
                    })
                }
            });


        }
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

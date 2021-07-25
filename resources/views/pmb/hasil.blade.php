@extends('pmb.layout')
@section('content')
<div class="container"  style="background-color:white;margin-top:20px;">
    <main role="main">
        <h2>Pengumuman Kelulusan PMB Tahun 2021</h2>
        <hr>
        <table class="table table-bordered" id="tabel-data">
            <tr>
                <th width="40">Nomor</th>
                <th>NIK</th>
                <th>Nama Calon Siswa</th>
                <th>Status Kelulusan</th>
            </tr>
            @foreach($pmbs as $pmb)
            <tr>
                <td>{{$loop->iteration }}</td>
                <td>{{$pmb->nik}}</td>
                <td>{{$pmb->name}}</td>
                <td>{{$pmb->pass_status=='y'?'Lulus':'Tidak Lulus'}}</td>
            </tr>
            @endforeach
        </table>
    </main>
</div>
@endsection
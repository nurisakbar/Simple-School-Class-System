@extends('layouts.app')
@section('title','Penerimaan Siswa Baru')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    @include('alert')
                    <table class="table table-bordered" id="tabel-data">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>No KK</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status Pembayaran</th>
                                <th width="90">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pmbs as $pmb)
                            <tr>
                                <td>{{$pmb->nik}}</td>
                                <td>{{$pmb->kk}}</td>
                                <td>{{$pmb->name}}</td>
                                <td>{{$pmb->phone}}</td>
                                <td>{{$pmb->payment_status==1?'Sudah Bayar':'Belum Bayar'}}</td>
                                <td>
                                    <a href="/pmb/{{$pmb->id}}" class="btn btn-primary" style="float:left;margin-right:10px;">Detail</a>
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

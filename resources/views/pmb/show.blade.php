@extends('layouts.app')
@section('title','Detail Calon Siswa')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    {!! Form::model($pmb,['url'=>'pmb/'.$pmb->id,'method'=>'put']) !!}
                    <input type="hidden" name="page" value="pmb/{{$pmb->id}}">
                    <div class="row">
                        <div class="col-md-8">
                            @include('pmb.form')
                        </div>
                        <div class="col-md-4">
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="2">Bukti Pembayaran</th>
                                </tr>
                                <tr>
                                    <td colspan="2"><img width="300" src="{{ asset('pmb/'.$pmb->proof_of_payment)}}"></td>
                                </tr>
                                <tr>
                                    <td width="160">Status Pembayaran</td>
                                    <td>{!! Form::select('payment_status', ['1'=>'Diterima',0=>'Ditolak'], $pmb->payment_status, ['class'=>'form-control']) !!}</td>
                                </tr>
                                <tr>
                                    <td width="160">Status Kelulusan</td>
                                    <td>{!! Form::select('pass_status', [null=>'Belum','y'=>'Lulus','n'=>'Tidak Lulus'], $pmb->pass_status, ['class'=>'form-control']) !!}</td>
                                </tr>
                                <tr>
                                    <td>Waktu Ujian</td>
                                    <td>
                                        {!! Form::text('test_schedule', $pmb->test_schedule, ['class'=>'form-control','id'=>'datetimepicker']) !!}
                                        {{-- <input name="test_schedule" id="datetimepicker" type="text" > --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="160">Ruangan</td>
                                    <td>{!! Form::select('room_id', $rooms, $pmb->room_id, ['class'=>'form-control']) !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-danger" style="width:100%">Simpan</button>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="/manage-pmb" class="btn btn-danger"  style="width:100%">Kembali</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="{{asset('datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>
    <script>
        // CKEDITOR.replace( 'description' );
        $('#datetimepicker').datetimepicker();
</script>
@endpush
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('datetimepicker/build/jquery.datetimepicker.min.css')}}"/ >
@endpush

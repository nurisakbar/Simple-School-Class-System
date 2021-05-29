@extends('pmb.layout')
@section('content')
<div class="container"  style="background-color:white;margin-top:20px;">
    <main role="main">
        <h2>FORMULIR PENERIMAAN PESERTA DIDIK BARU TAHUN 2021</h2>
        <hr>
        {!! Form::open(['url'=>'pmb/register']) !!}
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <td>Nama</td>
                        <td>{!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nama Lengkap']) !!}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{!! Form::select('gender', ['M'=>'Laki Laki','F'=>'Perempuan'], null, ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>NIK & No KK</td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::text('nik', null, ['class'=>'form-control','placeholder'=>'NIK']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::text('kk', null, ['class'=>'form-control','placeholder'=>'Nomor KK']) !!}
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::text('birth_place', null, ['class'=>'form-control','placeholder'=>'Nama Lengkap']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::date('birth_date', null, ['class'=>'form-control','placeholder'=>'Tempat Lahir']) !!}
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>
                            {!! Form::select('religion', ['I'=>'Islam','K'=>'Kristen'], null, ['class'=>'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat Lengkap</td>
                        <td>
                            {!! Form::textarea('address', null, ['rows'=>2,'class'=>'form-control','placeholder'=>'Alamat Lengkap']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td>{!! Form::text('phone', null, ['class'=>'form-control','placeholder'=>'Nomor HP']) !!}</td>                    
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-info">Daftar</button>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        {!! Form::close() !!}
    </main>
</div>
@endsection
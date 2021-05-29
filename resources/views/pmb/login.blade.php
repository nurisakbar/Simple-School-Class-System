@extends('pmb.layout')
@section('content')
<div class="container"  style="background-color:white;margin-top:20px;">
    <main role="main">
        <h2>FORMULIR LOGIN PESERTA DIDIK</h2>
        <hr>
        {!! Form::open(['url'=>'pmb/login']) !!}
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <td width="250">No Induk Kependudukan</td>
                        <td>{!! Form::text('nik', null, ['class'=>'form-control','placeholder'=>'NIK']) !!}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>{!! Form::date('birth_date', null, ['class'=>'form-control','placeholder'=>'Tanggal Lahir']) !!}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-info">Login</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        {!! Form::close() !!}
    </main>
</div>
@endsection
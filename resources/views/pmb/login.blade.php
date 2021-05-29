@extends('pmb.layout')
@section('content')
<div class="container"  style="background-color:white;margin-top:20px;">
    <main role="main">
        <h2>FORMULIR LOGIN PESERTA DIDIK</h2>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <td>Nama</td>
                        <td>{!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nama Lengkap']) !!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</div>
@endsection
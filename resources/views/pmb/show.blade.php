@extends('layouts.app')
@section('title','Detail Pembayaran')
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
                                    <th>Bukti Pembayaran</th>
                                </tr>
                                <tr>
                                    <td><img width="300" src="{{ asset('pmb/'.$pmb->proof_of_payment)}}"></td>
                                </tr>
                                <tr>
                                    <td>{!! Form::select('payment_status', ['1'=>'Diterima',0=>'Ditolak'], $pmb->payment_status, ['class'=>'form-control']) !!}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" class="btn btn-danger" style="width:100%">Simpan</button>
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
    <script>
        CKEDITOR.replace( 'description' );
</script>
@endpush

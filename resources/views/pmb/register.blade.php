@extends('pmb.layout')
@section('content')
<div class="container"  style="background-color:white;margin-top:20px;">
    <main role="main">
        <h2>FORMULIR PENERIMAAN PESERTA DIDIK BARU TAHUN 2021</h2>
        <hr>
        @if(isset($pmb))
            {!! Form::model($pmb,['url'=>'pmb/register']) !!}
            
            @if($pmb->proof_of_payment==null and $pmb->payment_status==null)
                <div class="alert alert-success" role="alert">
                        Silahkan Upload Bukti Pembayaran Anda <a href="#exampleModal" data-toggle="modal" data-target="#exampleModal">Disini.</a>
                </div>
            @elseif($pmb->payment_status!=null)
              <div class="alert alert-success" role="alert">
                Pembayaran anda sudah terkonfirmasi, downloat kartu ujian <a target="new" href="/pmb/kartu-ujian">disini.</a>
            </div>
            @else
            <div class="alert alert-success" role="alert">
                Bukti Pembayaran anda sedang diproses oleh admin, silahkan menunggu info selanjutnya.
            </div>
            @endif
        @else
            {!! Form::open(['url'=>'pmb/register']) !!}
        @endif


        <div class="row">
            <div class="col-md-12">
                @include('alert')
                @include('pmb.form')
            </div>
        </div>
        {!! Form::close() !!}
    </main>
</div>



  <!-- Modal -->
  {!! Form::open(['url'=>'pmb/register','files'=>true]) !!}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="type" value="bukti_pembayaran">
            <table class="table table-bordered">
                <tr>
                    <td>Upload Bukti Pembayaran PMB</td>
                </tr>
                <tr>
                    <td><input type="file" name="image"></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
@endsection
@extends('layouts.app')
@section('title','List payment')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    <a href="{{route('payment.create')}}" class="btn btn-primary">Create New payment</a>
                    <hr>
      
                    @include('alert')
                    <table class="table table-bordered" id="tabel-data">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th>Student</th>
                                <th>Payment Type</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th width="200"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payment as $payment)
                            <tr>
                                <td>#{{ $loop->iteration }}</td>
                                <td>{{$payment->student->name}}</td>
                                <td>{{$payment->payment_type}}</td>
                                <td>{{$payment->amount}}</td>
                                <td>{{$payment->description}}</td>
                                <td>
                                    <a href="/payment/{{$payment->id}}" class="btn btn-primary" style="float:left;margin-right:10px;">Cetak</a>
                                    <a href="/payment/{{$payment->id}}/edit" class="btn btn-primary" style="float:left;margin-right:10px;">Edit</a>
                                    {!! Form::open(['route'=>['payment.destroy',$payment->id],'method'=>'delete']) !!}
                                        <button class="btn btn-primary" type="submit">Delete</button>
                                    {!! Form::close() !!}
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

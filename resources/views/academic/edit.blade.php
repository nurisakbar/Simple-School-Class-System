@extends('layouts.app')
@section('title','Edit academic')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    {!! Form::model($academic,['route'=>['academic.update',$academic->id],'method'=>'PUT','files'=>true]) !!}
                    
                    @include('academic.form')

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

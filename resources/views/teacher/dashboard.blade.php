@extends('layouts.app')
@section('title','Teacher Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    Hello {{Auth::guard('teacher')->user()->name}}, You Are Login As Teacher
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

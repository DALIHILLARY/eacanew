@extends('layouts.app')

@section('content')
    @include('admin.findings.header')

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('admin.findings.table')
        </div>
    </div>

@endsection

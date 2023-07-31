@extends('layouts.app')

@section('content')
    @include('admin.users.header')

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('admin.users.table')
        </div>
    </div>

@endsection

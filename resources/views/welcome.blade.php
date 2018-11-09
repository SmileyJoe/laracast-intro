@extends('layout')

@section('page_title', 'Welcome')

@section('content_main')

    <h3>@yield('page_title') {{ $name }}</h3>

@endsection
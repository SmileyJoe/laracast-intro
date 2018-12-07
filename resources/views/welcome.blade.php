@extends('layout')

@section('page_title', 'Welcome')

@section('content_main')

    @if($name)
        <h3>Hi, {{ $name }}</h3>
    @endif
@endsection
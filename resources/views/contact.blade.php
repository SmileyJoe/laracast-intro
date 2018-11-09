@extends('layout')

@section('page_title', 'Contact')

@section('content_main')

    <h3>@yield('page_title')</h3>

    <ul>
        @foreach($details as $detail)
            <li>{{ $detail }}</li>
        @endforeach
    </ul>

@endsection
@extends('layout')

@section('page_title', 'Contact')

@section('content_main')

    <ul>
        @foreach($details as $detail)
            <li>{{ $detail }}</li>
        @endforeach
    </ul>

@endsection
@extends('layout')

@section('page_title', 'Projects')

@section('content_main')

    <ul>
        @foreach($notifications as $notification)
            <li>{{ $notification->type }}</li>
        @endforeach
    </ul>
@endsection
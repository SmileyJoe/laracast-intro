@extends('layout')

@section('page_title', 'Projects')

@section('content_main')

    <h2>@yield('page_title')</h2>

    <ul>
        @foreach($projects as $project)
            <li>{{ $project->title }}</li>
        @endforeach
    </ul>
@endsection
@extends('layout')

@section('page_title', $pageTitle)

@section('not_found')
    <p>No record found</p>
@endsection

@section('found')
    <h2>{{ $project->title }}</h2>

    <p>
        {{ $project->description }}
    </p>
@endsection

@section('content_main')
    @if(!$found)
        @yield('not_found')
    @else
        @yield('found')
    @endif
@endsection
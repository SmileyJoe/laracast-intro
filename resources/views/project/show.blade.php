@extends('layout')

@section('page_title', $project->title)

@section('content_main')
    <h2>{{ $project->title }}</h2>

    <p>
        {{ $project->description }}
    </p>

    <p>
        <a href="/project/{{ $project->id }}/edit">Edit</a>
    </p>
@endsection
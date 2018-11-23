@extends('layout')

@section('page_title', $project->title)

@section('content_main')
    <h2>{{ $project->title }}</h2>

    <p>
        {{ $project->description }}
    </p>

    <p>
        <a href="/project/edit/{{ $project->id }}">Edit</a>
    </p>
@endsection
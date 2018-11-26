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

    <p>
        <form id="delete_form" action="{{ url('project/'.$project->id) }}" method="post">
            @csrf
            @method('delete')
            <a href="#" onclick="document.getElementById('delete_form').submit();">Delete</a>
        </form>

    </p>
@endsection
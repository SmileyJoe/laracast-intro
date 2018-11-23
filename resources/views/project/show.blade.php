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
        <form id="myform" action="{{ url('project/'.$project->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field("delete") }}
            <a href="#" onclick="document.getElementById('myform').submit();">Delete</a>
        </form>

    </p>
@endsection
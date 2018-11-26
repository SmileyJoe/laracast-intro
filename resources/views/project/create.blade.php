@extends('layout')

@section('page_title', 'Project Create')

@section('content_main')
    <p>Create a project</p>

    <form method="post" action="{{ $formAction }}" class="vertical">
        @csrf

        <input type="text" name="title" placeholder="Enter a title" value="{{ $project->title }}">
        <textarea name="description" placeholder="Enter a description">{{ $project->description }}</textarea>

        @if($edit)
            @method('put')
            <input type="hidden" name="id" value="{{ $project->id }}">
            <button type="submit">Update</button>
        @else
            <button type="submit">Create</button>
        @endif
    </form>

@endsection
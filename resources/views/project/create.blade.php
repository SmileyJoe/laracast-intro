@extends('layout')

@section('page_title', 'Project Create')

@section('content_main')
    @if($edit)
        <p>Edit {{ $project->title }}</p>
    @else
        <p>Create a project</p>
    @endif

    <form method="post" action="{{ $formAction }}" class="vertical">
        @csrf

        <input type="text" name="title" placeholder="Enter a title" value="{{ $project->title }}">
        @include('element_input_error', ['inputName'=> 'title'])

        <textarea name="description" placeholder="Enter a description">{{ $project->description }}</textarea>
        @include('element_input_error', ['inputName'=> 'description'])

        @if($edit)
            @method('put')
            <input type="hidden" name="id" value="{{ $project->id }}">
            <button type="submit">Update</button>
        @else
            <button type="submit">Create</button>
        @endif
    </form>

@endsection
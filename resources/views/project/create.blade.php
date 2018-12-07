@extends('layout')

@if($edit)
    @section('page_title', 'Edit')
@else
    @section('page_title', 'Create a project')
@endif

@section('content_main')
    <form method="post" action="{{ $formAction }}">
        @csrf

        <div class="field">
            <label class="label">Title</label>
            <div class="control">
                <input type="text" class="input" name="title" placeholder="Enter a title" value="{{ $project->title }}">
            </div>
            @include('element_input_error', ['inputName'=> 'title'])
        </div>

        <div class="field">
            <label class="label">Description</label>
            <div class="control">
                <textarea name="description" class="textarea" placeholder="Enter a description">{{ $project->description }}</textarea>
                @include('element_input_error', ['inputName'=> 'description'])
            </div>
        </div>

        <div class="field">
            <div class="control">
                @if($edit)
                    @method('put')
                    <input type="hidden" name="id" value="{{ $project->id }}">
                    <button type="submit" class="button">Update</button>
                @else
                    <button type="submit" class="button">Create</button>
                @endif
            </div>
        </div>
    </form>

@endsection
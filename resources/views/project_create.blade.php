@extends('layout')

@section('page_title', 'Project Create')

@section('content_main')
    <p>Create a project</p>

    <form method="post" action="/project/create" class="vertical">
        {{ csrf_field() }}
        <input type="text" name="title" placeholder="Enter a title">
        <textarea name="description" placeholder="Enter a description"></textarea>
        <button type="submit">Create</button>
    </form>

@endsection
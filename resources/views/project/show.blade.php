@extends('layout')

@section('page_title', $project->title)

@section('content_main')
    <h2>{{ $project->title }}</h2>

    <p>
        {{ $project->description }}
    </p>

    @if($project->tasks->count())
        <div>
            <h2>Tasks</h2>

            <ul>
                @foreach($project->tasks as $task)
                    <li>{{ $task->description }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p>
        <form id="delete_form" action="{{ url('project/'.$project->id) }}" method="post">
            @csrf
            @method('delete')
            <a href="/project/{{ $project->id }}/edit" style="padding-right: 10px">Edit</a>
            <a href="#" onclick="document.getElementById('delete_form').submit();" style="color: red">Delete</a>
        </form>
    </p>
@endsection
@extends('layout')

@section('page_title', $project->title)

@section('content_main')
    <form id="delete_form" action="{{ url('project/'.$project->id) }}" method="post">
        @csrf
        @method('delete')
        <a href="/project/{{ $project->id }}/edit" style="padding-right: 10px">Edit</a>
        <a href="#" onclick="document.getElementById('delete_form').submit();" style="color: red">Delete</a>
    </form>

    <h2>{{ $project->title }}</h2>

    <p>
        {{ $project->description }}
    </p>

    <div>
        <h2>Tasks</h2>
        @if($project->tasks->count())
            @foreach($project->tasks as $task)
                <form method="post" action="/task/{{ $task->id }}">
                    @csrf
                    @method('put')

                    <label class="checkbox {{ $task->completed ? 'is_complete' : '' }}" for="completed">
                        <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        {{ $task->description }}
                    </label>
                </form>
            @endforeach
        @endif

        <form method="post" action="/task">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <input type="text" name="description" placeholder="Task details">
            @include('element_input_error', ['inputName'=> 'description'])

            <button type="submit">Create</button>
        </form>
    </div>
@endsection
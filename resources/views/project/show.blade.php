@extends('layout')

@section('page_title', $project->title)

@section('content_main')

    <div style="margin-bottom: 20px">

        <p class="content">
            {{ $project->description }}
        </p>

        <form id="delete_form" action="{{ url('project/'.$project->id) }}" method="post">
            @csrf
            @method('delete')
            <a class="button is-link" href="/project/{{ $project->id }}/edit" style="padding-right: 10px">Edit</a>
            <button type="submit" class="button is-danger">Delete</button>
        </form>
    </div>

    <div>
        <div class="card" style="margin-bottom: 10px">
            <div class="card-body">
                <h2 class="heading">Tasks</h2>
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
            </div>
        </div>

        <div class="card">
            <form method="post" action="/task" class="card-body">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <div class="field">
                    <label class="label">Task</label>
                    <div class="control">
                        <input type="text" class="input" name="description" placeholder="Task details">
                    </div>
                </div>
                @include('element_input_error', ['inputName'=> 'description'])

                <button type="submit" class="button">Create</button>
            </form>
        </div>
    </div>
@endsection
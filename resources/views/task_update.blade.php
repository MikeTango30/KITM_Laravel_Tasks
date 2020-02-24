@extends('layouts/main')
@section('promo')
    @component('_partials.promo')
        @slot('title')
            <h1>Add new Task</h1>
        @endslot
    @endcomponent
@stop
@section('content')
    <div class="container">
        <div class="row errors">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row add-task">
            <h3>Add new Task</h3>
            <form method="post" action="/task/update/{{ $task->id }}" class="p-5 bg-white w-100">
                @csrf
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="taskSubject">Subject</label>
                        <input type="text" id="taskSubject" class="form-control" name="subject" value="{{ ucfirst($task->subject) }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="taskPriority">Priority</label>
                        <select id="taskPriority" class="form-control" name="priority_id">
                            <option selected value="{{ $task->priority_id }}">{{ ucfirst($currentPriority->priority_name) }}</option>
                            @foreach($priorities as $priority)
                                <option value="{{ $priority->id }}">{{ ucfirst($priority->priority_name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="taskDueDate">Due Date</label>
                        <input type="date" id="taskDueDate" class="form-control" name="due_date" value="{{ $task->due_date }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="taskStatus">Status</label>
                        <select id="taskStatus" class="form-control" name="status_id">
                            <option selected value="{{ $task->status_id }}">{{ ucfirst($currentStatus->status_name) }}</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ ucfirst($status->status_name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="taskCompleteness">Percent Completed</label>
                        <input id="number" class="form-control" name="completeness" value="{{ $task->completeness }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6">
                        <input type="submit" value="Add Task" class="btn btn-primary py-2 px-4 text-white">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
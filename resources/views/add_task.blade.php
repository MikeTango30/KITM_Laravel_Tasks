@extends('layouts/main')
@section('promo')
    @component('_partials.promo')
        @slot('title')
            <h1 class="my-auto w-100">Add new Task</h1>
        @endslot
    @endcomponent
@stop
@section('content')
    <div class="container">
        <div class="row add-task">
            <form method="post" action="/store-task" class="p-5 bg-white w-100" enctype="multipart/form-data">
                @csrf
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
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="taskSubject">Subject</label>
                        <input type="text" id="taskSubject" class="form-control" name="subject" placeholder="Enter subject">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="taskPriority">Priority</label>
                        <select id="taskPriority" class="form-control" name="priority">
                            <option selected disabled value="Priority">Select Priority</option>
                            @foreach($priorities as $priority)
                                <option value="{{ $priority->id }}">{{ ucfirst($priority->priority_name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="taskDueDate">Due Date</label>
                        <input type="date" id="taskDueDate" class="form-control" name="dueDate">
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

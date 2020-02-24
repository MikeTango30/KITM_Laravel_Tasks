@extends('layouts.main')
@section('promo')
    @component('_partials.promo')
        @slot('title')
            <h1 class="my-auto w-100">My Tasks</h1>
        @endslot
    @endcomponent
@stop
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <a href="{{ url('/add-task') }}" class="btn btn-primary my-5">Add new task</a>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Percent Completed</th>
                        <th scope="col">Modified On</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="task task--id">{{ $loop->index + 1 }}</td>
                            <td class="task task--subject">{{ ucfirst($task->subject) }}</td>
                            <td class="task task--priority">
                                <span class="badge badge-pill badge-{{ $task->priority_name }}">{{ ucfirst($task->priority_name) }}</span>
                            </td>
                            <td class="task task--due-date">{{ $task->due_date }}</td>
                            <td class="task task--status">{{ ucfirst($task->status_name) }}</td>
                            <td class="task task--completeness">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $task->completeness }}"
                                         aria-valuemin="0" aria-valuemax="100" style="width:{{ $task->completeness }}%">
                                        {{ $task->completeness }}% Complete
                                    </div>
                                </div>
                            </td>
                            <td class="task task--modified">{{ $task->updated_at }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                            Delete
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <a href="/task/update/form/{{ $task->taskId }}" class="btn btn-success">Update</a>
                                    </div>
                                </div>
                                <!-- Really Delete Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                     aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Delete task?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <a href="/task/delete/{{ $task->taskId }}" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <h2>My TODO list</h2>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col"></th>
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
                            <td>#</td>
                            <td>{{ ucfirst($task->subject) }}</td>
                            <td>{{ ucfirst($task->priority_name) }}</td>
                            <td>{{ $task->due_date }}</td>
                            <td>{{ ucfirst($task->status_name) }}</td>
                            <td>{{ $task->completeness }}</td>
                            <td>{{ $task->updated_at }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                            Delete
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <a href="/task/update/form/{{ $task->id }}" class="btn btn-success">Update</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @if(isset($task->id))
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
                                    <a href="/task/delete/{{ $task->id }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
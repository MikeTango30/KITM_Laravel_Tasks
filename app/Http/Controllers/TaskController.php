<?php

namespace App\Http\Controllers;

use App\Priority;
use App\Status;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addTask()
    {
        $priorities = Priority::all();

        return view('add_task', compact('priorities'));
    }

    public function storeTask(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required',
            'priority' => 'required',
            'dueDate' => 'required',
        ]);


        $task = Task::create([
            'subject' => request('subject'),
            'user_id' => Auth::id(),
            'priority_id' => request('priority'),
            'due_date' => request('dueDate'),
        ]);

        return redirect('/');
    }

    public function showUpdateTaskForm(Task $task)
    {
        $statuses = Status::all();
        $statusId = $task->getAttribute('status_id');
        $currentStatus = Status::select('status_name')->find($statusId);

        $priorities = Priority::all();
        $priorityId = $task->getAttribute('priority_id');
        $currentPriority = Priority::select('priority_name')->find($priorityId);


        return view('task_update',
            compact('task', 'statuses', 'currentStatus', 'priorities', 'currentPriority'));
    }

    public function updateTask(Request $request, Task $task)
    {

        $validatedData = $request->validate([
            'subject' => 'required',
            'priority_id' => 'required',
            'due_date' => 'required',
            'status_id' => 'required',
            'completeness' => 'required|numeric|between:0,100'
        ]);


            Task::where('id', $task->getAttribute('id'))->update($request->except(['_token']));

            return redirect('/');

    }

    public function destroy(Task $task)
    {

        $task->delete();

        return redirect('/');
    }
}

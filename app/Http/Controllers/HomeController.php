<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showTasks()
    {
        $tasks = Task::select('*', DB::raw("tasks.id as taskId"))
            ->join('statuses', 'tasks.status_id', '=', 'statuses.id')
            ->join('priorities', 'tasks.priority_id', '=', 'priorities.id')
            ->simplePaginate(10);

        return view('show_tasks', compact('tasks'));
    }
}

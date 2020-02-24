<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
            ->where('tasks.user_id', '=', Auth::id())
            ->simplePaginate(10);

        return view('show_tasks', compact('tasks'));
    }

    public function logout() {

        Auth::logout();

        return redirect('/login');
    }
}

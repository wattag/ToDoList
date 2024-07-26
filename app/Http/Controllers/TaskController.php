<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tasks\CreateRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        return view('tasks.index', [
            'tasks' => auth()->user()->tasks,
        ]);
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        auth()->user()->tasks()->create($request->validated());

        return redirect(route('tasks.index'));
    }

    public function destroy(Task $task): RedirectResponse
    {
        if ($task->user_id === auth()->id()) {
            $task->delete();
        }

        return redirect(route('tasks.index'));
    }
}

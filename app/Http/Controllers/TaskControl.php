<?php

namespace App\Http\Controllers;
use App\Models\task;
use App\Models\gtask;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\ReturnTypePass;

class TaskControl extends Controller
{
    public function addtask(Request $tasks)
    {
        $ae = Auth::user()->email;

        $tasks->validate([
            'taskname' => 'required|unique:tasks,taskname,NULL,id,email,' . $ae,
            'date' => 'required',
            'time' => 'required',
            'description' => 'required',
        ]);
       
        $t = Task::create([
            'taskname' => $tasks->input('taskname'),
            'date' => $tasks->input('date'),
            'time' => Carbon::createFromFormat('H:i', $tasks->input('time')),
            'description' => $tasks->input('description'),
            'email' => $ae,
            
        ]);

       
        return Redirect::route('home');
    }


    public function getTask()
{
    $user = Auth::user();
    $authEmail = $user->email;

    $gtasks = gtask::where('members', 'like', "%$authEmail%")->get();
    $tasks = task::where('email', $authEmail)->get();

    $allTasks = $gtasks->concat($tasks);

    return view('home', compact('allTasks'));
}

}

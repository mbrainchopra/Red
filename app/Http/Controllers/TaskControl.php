<?php

namespace App\Http\Controllers;
use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'time' => $tasks->input('time'),
            'description' => $tasks->input('description'),
            'email' => $ae,
            
        ]);

       
return view('addtask')->with('success', 'Your Task Added. I will inform you on time');
    }
}

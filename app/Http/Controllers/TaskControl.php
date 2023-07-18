<?php

namespace App\Http\Controllers;
use App\Models\task;

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

       
return view('addtask')->with('success', 'Your Task Added. I will inform you on time');
    }


    public function getTask()
    {
         $user = Auth::user();
        
        $email = $user->email;/*
        $ta = task::where('email', $email)->get();
        return $ta; */
     /*     $currentDateTime = Carbon::now();
        return $currentDateTime; */

   
/* 
        $datetime = Carbon::now()->timezone('Asia/Kolkata'); 
         $time = $datetime->format('H:i'); // Example format: 15:20:00
        $date = $datetime->toDateString();
       */
        
         $tasknow=task::where('email',$email)->/* where('date',$date)->where('time',$time)-> */get();
        return view('home', compact('tasknow')); 

    }
}

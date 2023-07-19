<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\group;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\gtask;
use Illuminate\Http\Request;

class Groupcontrol extends Controller
{
  public function makegroup(Request $tasks){
    $tasks->validate([
        'gname' => 'required|unique:groups,gname' ,
        'members' => 'required',
        
        'description' => 'required',
    ]);
    
    $t = group::create([
        'gname' => $tasks->input('gname'),
        'members' => $tasks->input('members'),
        'description' => $tasks->input('description'),
  
        
    ]); 
    return redirect()->back();
  }

public function showgroup()
{
    $authEmail = auth()->user()->email;

    // Retrieve all groups where the members column contains the authenticated user's email
    $groups = group::where('members', 'like', "%$authEmail%")->get();

    return view('group-info', compact('groups'));
}

public function makegrouptask(Request $r){
   
    $ae = Auth::user()->email;

    $r->validate([
        'taskname' => 'required|unique:tasks,taskname,NULL,id,email,' . $ae,
        'date' => 'required',
        'time' => 'required',
        'description' => 'required',
        'members'=>'required'
        
    ]);
   
     $t = gtask::create([
        'taskname' => $r->input('taskname'),
        'date' => $r->input('date'),
        'time' => Carbon::createFromFormat('H:i', $r->input('time')),
        'description' => $r->input('description'),
        'uemail' => $ae,
        'members'=>$r->input('members')
        
    ]);  return Redirect::route('home');
}
}


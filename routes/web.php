<?php
use App\Http\Controllers\Groupcontrol;
use App\Http\Controllers\TaskControl;
use Illuminate\Support\Facades\Route;
use App\Models\group;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('taskadd',[TaskControl::class,'addtask']);
Auth::routes();
/* 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
Route::get('home',[TaskControl::class,'getTask'])->name('home');
Route::view('addtask','addtask');
Route::get('tasknow',[TaskControl::class,'gettask']);
Route::view('test','test');
Route::view('group','addgroup');
Route::post('groupadd',[Groupcontrol::class,'makegroup']);
Route::post('add-task',[Groupcontrol::class,'makegrouptask']);
Route::get('group-info',[Groupcontrol::class,'showgroup']);

Route::post('delete', function () {
    // Retrieve the group ID and email from the request
    $groupId = request('groupId');
    $email = request('email');

    // Find the group by ID
    $group = group::find($groupId);

    // Check if the group exists
    if ($group) {
        // Retrieve the current members and remove the specified email
        $members = explode(',', $group->members);
        $updatedMembers = array_diff($members, [$email]);

        // Update the members column with the updated members list
        $group->members = implode(',', $updatedMembers);
        $group->save();

        // Redirect back or return a success response
        return redirect()->back()->with('success', 'Member removed successfully.');
    }

    // Redirect back or return an error response
    return redirect()->back()->with('error', 'Group not found.');
});

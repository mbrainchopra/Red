@extends('layouts.app')




@section('content')
    <!DOCTYPE html>
    <html lang="en">
<style>
.card {
  transition: transform 0.3s linear;
}

.card:hover {
  transform: scale(1.2);
}




</style>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
      <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
      <script src="{{ asset('push.min.js') }}"></script>
      <script src="{{ asset('serviceWorker.min.js') }}"></script>

        <link rel="icon" href="hicon.png" type="image/png">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>T(o)AskRe(a)d</title>
    </head>
    
    <body class="bg-light">
      
     
        <div class="container">
            <div class="row ">
                <div class=" col mt-5 sm-4">
                    <div class="card mt-10" style="width: 18rem;">
                        <img src="t-1.jpg" class="card-img-top" alt="..." height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Add Task</h5>
                            <p class="card-text">Here You can add the reminder for you and it will alert you at the correct time</p>
                            <a href="{{ url('addtask') }}" class="btn btn-primary">Create</a>
                        </div>
                    </div>
                </div><br>
                <div class="col mt-5 sm-4">
                    <div class="card mt-10" style="width: 18rem;">
                        <img src="t-2.jpg" class="card-img-top" alt="..." height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Alter Task</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Alter</a>
                        </div>
                    </div>
                </div><br>
                <div class="col mt-5 sm-4">
                    <div class="card mt-10" style="width: 18rem;">
                        <img src="t-3.jpg" class="card-img-top" height="200px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Group Task</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="{{url('group')}}" class="btn btn-primary">Group</a>
                            <a href="{{url('group-info')}}" class="btn btn-primary">My Groups</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($allTasks as $task)
        <script>
            window.onload = function() {
                checkTaskTime('{{ $task->date }}', '{{ $task->time }}', '{{ $task->taskname }}', '{{ $task->description }}');
            };
    
            function checkTaskTime(date, time, taskName, taskDescription) {
                var taskDateTime = new Date(date + 'T' + time); // Combine date and time using 'T' separator
                var currentDateTime = new Date();
    
                if (taskDateTime > currentDateTime) {
                    var timeDiff = taskDateTime.getTime() - currentDateTime.getTime();
                    setTimeout(function() {
                        start(taskName, taskDescription);
                    }, timeDiff);
                }
            }
    
            function start(taskName, taskDescription) {
                Push.create(taskName, {
                    body: taskDescription,
                    icon: 'hicon.png',
                    timeout: 0,
                    onClick: function() {
                        window.focus();
                    }
                });
    
                speakNotification(taskName, taskDescription);
            }
    
            function speakNotification(taskName, taskDescription) {
                if ('speechSynthesis' in window) {
                    var speechMsg = new SpeechSynthesisUtterance();
                    speechMsg.lang = 'en-US';
                    speechMsg.text = taskName + '. ' + taskDescription;
    
                    speechSynthesis.speak(speechMsg);
                }
            }
        </script>
    @endforeach
    
    </body>

    </html>



@endsection

@extends('layouts.app')



{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}


@section('content')
    <!DOCTYPE html>
    <html lang="en">

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

    <body class="bg-secondary">

        <div class="container">
            <div class="row ">
                <div class="col-4">
                    <div class="card mt-10" style="width: 18rem;">
                        <img src="t-1.jpg" class="card-img-top" alt="..." height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Add Task</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="{{ url('addtask') }}" class="btn btn-primary">Create</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mt-10" style="width: 18rem;">
                        <img src="t-2.jpg" class="card-img-top" alt="..." height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Alter Task</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Alter</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mt-10" style="width: 18rem;">
                        <img src="t-3.jpg" class="card-img-top" height="200px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Group Task</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Group</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        @foreach($tasknow as $task)
        <script>
            window.onload = function() {
                checkTaskTime('{{ $task->date }}', '{{ $task->time }}');
            };
    
            function checkTaskTime(date, time) {
                var taskDateTime = new Date(date + ' ' + time);
                var currentDateTime = new Date();
    
                if (taskDateTime > currentDateTime) {
                    var timeDiff = taskDateTime.getTime() - currentDateTime.getTime();
                    setTimeout(function() {
                        start('{{ $task->taskname }}', '{{ $task->description }}');
                    }, timeDiff);
                }
            }
    
            function start(taskName, taskDescription) {
                Push.create(taskName, {
                    body: taskDescription,
                    icon: 'hicon.png',
                    timeout: 10000,
                    onClick: function() {
                        window.focus();
                        this.close();
                    }
                });
            }
        </script>
    @endforeach
    
    
   
    </body>

    </html>



@endsection

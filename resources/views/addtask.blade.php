<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>


    <link rel="icon" href="hicon.png" type="image/png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    span{
        color: red;
    }
</style>

@if($errors->any())
    @foreach ($errors->all() as $error )
        <div class=" alert alert-danger" >
            {{"The TaskName already Alerted by you"}}
        </div>
    @endforeach
@endif

<body>
  @if(session('success'))
    <script>
        window.alert('Your Task Added');
    </script>
@endif
    <div class="container "> <!-- Added "mt-5" class for top margin -->
      <div class="row">
        <div class="col-md-6">
          <img src="f-1.jpg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 mt-5" >
            <h6 class="display-6"><span>Add</span> Task</h6>
          <form method="post" action="{{url('taskadd')}}">
            @csrf
            @method('post')
            <div class="form-group">
              <label for="task-name ">Task Name:</label>
              <input type="text" id="task-name" name="taskname" placeholder="Enter the task name" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
              <label for="task-time">Task Time:</label>
              <input type="time" id="task-time" name="time" class="form-control" placeholder="Enter the task date" required value="{{old('time')}}">
            </div>
            <br>
            <div class="form-group">
              <label for="task-date">Task Date:</label>
              <input type="date" id="task-date" name="date" class="form-control" placeholder="Enter the task time" required value="{{old('date')}}">
            </div>
            <br>
            <div class="form-group">
              <label for="task-description">Task Description:</label>
              <textarea id="task-description" name="description" class="form-control" placeholder="About the task" required>{{ old('description') }}</textarea>
            </div>
            <br>
            <button type="submit"  class="btn btn-primary">Add Task</button>
         
          </form><br><br>  <a href="{{url('home')}}"><button   class="btn btn-success">Back to Home</button></a> 
        </div>
      </div>
    </div>
  </body>
  

</html>

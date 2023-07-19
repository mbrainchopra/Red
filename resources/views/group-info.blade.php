<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Group Details</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Custom CSS for modal */
        .custom-modal .modal-dialog {
            max-width: 500px;
        }

        .custom-modal .modal-content {
            padding: 20px;
            border-radius: 5px;
        }

        .task-form {
            opacity: 0;
            display: none;
            transition: opacity 0.3s ease-in-out;
        }

        .task-form.show {
            opacity: 1;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                @if ($groups->count() > 0)
                    @foreach ($groups as $group)
                        <h6 class="card-subtitle mb-2 text-muted">Group Name: {{ $group->gname }}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Members:</h6>
                        <ul class="list-unstyled">
                            @php
                                $memberEmails = explode(',', $group->members);
                            @endphp
                            @foreach ($memberEmails as $email)
                                <li>{{ $email }}</li>
                            @endforeach
                        </ul>
                      {{-- 
                            <form method="POST" action="{{ route('remove-member') }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="groupId" value="{{ $group->id }}">
                                <input type="hidden" name="email" value="{{ $email }}">
                                <button class="btn btn-sm btn-danger" type="submit">Remove</button>
                            </form> --}}
                 
                    
                        <form method="POST"  action="{{ url('delete') }}" >
                            @csrf
                            <input type="hidden" name="groupId" value="{{ $group->id }}">
                            <button type="submit" class="btn btn-danger">Leave Group</button>
                        </form><br>
                        <button type="button" class="btn btn-primary" id="addTaskBtn{{ $group->id }}">Add Task</button>

                        <!-- Add Task Form -->
                        <div class="task-form" id="addTaskForm{{ $group->id }}">
                            <form method="POST" action="{{ url('add-task') }}">
                                @csrf
                                <input type="hidden" name="groupId" value="{{ $group->id }}">
                                <div class="form-group">
                                    <label for="taskTitle">Task Title</label>
                                    <input type="text" class="form-control" id="taskTitle" name="taskname" required>
                                </div>
                                <div class="form-group">
                                    <label for="taskDescription">Task Description</label>
                                    <textarea class="form-control" id="taskDescription" name="description" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="members">Members</label>
                                    <input type="text" class="form-control" id="members" name="members" value="{{ implode(',', $memberEmails) }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="taskTime">Time</label>
                                    <input type="time" class="form-control" id="taskTime" name="time" required>
                                </div>
                                <div class="form-group">
                                    <label for="taskDate">Date</label>
                                    <input type="date" class="form-control" id="taskDate" name="date" required>
                                </div><br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div><hr><br><BR>
                    @endforeach
                @else
                    <p>No groups found for the authenticated user.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS script here -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Add Task Form toggling
        @foreach ($groups as $group)
            document.getElementById('addTaskBtn{{ $group->id }}').addEventListener('click', function() {
                document.getElementById('addTaskForm{{ $group->id }}').classList.toggle('show');
            });
        @endforeach
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TaskRed</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">



    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @section('logo')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>


        <link rel="icon" href="hicon.png" type="image/png">

    @show
    <!-- Styles -->
    <style>
        .task-image {
          width: 500px;
          height: auto;
        }
      </style>
</head>

<body class="antialiased">
    {{--  <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div> --}}

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="hicon.png" alt="" width="70" height="70">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item " >
                    <a class="nav-link" href="#" style="color:red">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" style="color:red">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" style="color:red">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" style="color:red">Contact</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <br><br>
          <div class="container ">
            <div class="row">
              <div class="col-md-6">
                <img src="vec1.jpg" alt="Task Management Image" class="task-image">
              </div>
              <div class="col-md-6 d-flex align-items-center">
                <div>
                    <style>
                        span{
                            color: red;
                        }
                    </style>
                  <h2 class="display-4"><span>T</span>(o) <span>Ask Re</span>(a)<span>d</span></h2>
                  <p  style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra fringilla dui ac aliquet. Donec sodales erat non nibh volutpat, sed rutrum enim tincidunt. Integer non vulputate sem, vitae fringilla mauris. Fusce non sollicitudin orci. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse fringilla justo at lobortis iaculis.</p>
                  <button class="btn btn-primary">Get Started</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="container">
            <div class="row">
              
              <div class="col-md-6 d-flex align-items-center">
                <div>
                  <h2 class="display-4">About </h2>
                  <p style="text-align: justify">"Our task management platform is designed to streamline and enhance productivity in both individual and team settings. With an intuitive and user-friendly interface, users can easily create, assign, and track tasks, ensuring effective collaboration and efficient workflow management. The platform offers advanced features such as real-time notifications, task prioritization, and deadline setting, enabling users to stay organized and meet project milestones. Additionally, our platform integrates with popular productivity tools, providing a seamless workflow experience. With insightful analytics and reporting, users can gain valuable insights into task performance and make data-driven decisions. Our platform prioritizes data security, ensuring robust encryption and access controls. Whether you're an individual, a small team, or a large organization, our scalable platform adapts to your needs, helping you achieve optimal task management and productivity."</p>
                </div>
              </div>
              <div class="col-md-6">
                <img src="vec2.jpg" alt="About Us Image" class="task-image">
              </div>
            </div>
          </div>
          <br><BR>
            <footer class="bg-dark text-light py-4">
                <div class="container">
                  <div class="row justify-content-center align-items-center g-2">
                    <div class="col-md-4 text-center">
                      <div class="font-bold">Email: support@micbrain.tech</div>
                    </div>
                    <div class="col-md-4 text-center">
                      <div class="font-bold">Phone: +91 82209 33622</div>
                    </div>
                    <div class="col-md-4 text-center">
                      <div class="font-bold">All Rights Reserved by micbrain.tech</div>
                    </div>
                  </div>
                </div>
              </footer>
              
        
 
</body>

</html>

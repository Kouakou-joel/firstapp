

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
    <a class="navbar-brand" href="#">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{ route('app_home')}}">Home</a>
        </li>

        <li class="nav-item ">
            <a class="nav-link  " aria-current="page" href="{{ route('app_about')}}">About</a>
        </li>
    </ul>
    </div>

    <!-- single light button -->
  <div class="btn-group">

    @guest
        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
           My account
       </button>
       <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
          <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>

        </ul>
    @endguest

    @auth
      <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
        {{ Auth::user()->name }}

      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('app_logout')}}">Logout</a></li>

      </ul>
    @endauth
  </div>

  </div>
  </nav>

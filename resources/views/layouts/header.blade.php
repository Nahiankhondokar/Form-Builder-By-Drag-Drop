
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link header_btn" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
            </li>
          <li class="nav-item">
            @can('organizer')
              <a class="nav-link header_btn" aria-current="page" href="{{route('template.index')}}">Form Builder</a>
            @endcan
          </li>
          <li class="nav-item">
              <a class="nav-link header_btn" aria-current="page" href="{{route('info.create')}}">Data Collect</a>
          </li>

          <li class="nav-item border bg-white">
            <a class="nav-link header_btn text-dark" aria-current="page" href="{{route('url.index')}}">URL shorten</a>
          </li>
         
        </ul>

        <div class="role-status d-flex mr-3 bg-white border rounded-1">
          <p class="nav-link header_btn mr-3 border p-1 text-dark m-auto text-center" aria-current="page" href="">
            Name : {{auth()->user()->name}}
            <br>
            <span class="text-primary text-center m-auto">{{ucfirst(auth()->user()->role)}}</span>
          </p>
        </div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a class="text-dark" href="{{route('logout')}}" 
          onclick="event.preventDefault(); this.closest('form').submit();"><b>Logout</b></a>

          
      </form>
      </div>
    </div>
  </nav>

  <style>
    .header_btn{
        color: white;
        font-weight: bold
    }
  </style>
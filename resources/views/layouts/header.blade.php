
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link header_btn" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
            </li>
          <li class="nav-item">
            <a class="nav-link header_btn" aria-current="page" href="#">Editor</a>
          </li>
        </ul>
       <a href="{{route('logout')}}" class="text-dark" style="text-decoration: none;
       font-weight:bold;">Logout</a>
      </div>
    </div>
  </nav>

  <style>
    .header_btn{
        color: white;
        font-weight: bold
    }
  </style>
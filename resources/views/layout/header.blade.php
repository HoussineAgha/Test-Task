<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color: white;">Task Test</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" style="color: white;">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color: white;">Link</a>
        </li>
      </ul>
    <div class="d-fle">
        @auth
        <a href="{{route('logout')}}" class="btn btn-primary" >Log out</a>
        <a href="{{route('control')}}" class="btn btn-primary" >Dashboard</a>

        @endauth
        @guest
        <a href="{{route('login')}}" class="btn btn-primary" >login</a>
        @endguest
    </div>
    </div>
  </div>
</nav>

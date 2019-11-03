<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          @foreach($navbar as $each_page)
          <li class="nav-item @yield('nav_'.$each_page) px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{ route($each_page) }}">
              {{$each_page}}
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
</nav>

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
          <li class="nav-item px-lg-4">
              @if($each_page == 'index')
              <a class="nav-link text-uppercase text-expanded" data-page="home" href="{{route('home')}}">
              Home
              @else
              <a class="nav-link text-uppercase text-expanded" data-page="{{$each_page}}" href="{{ route($each_page) }}">
              {{$each_page}}
              @endif
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
</nav>

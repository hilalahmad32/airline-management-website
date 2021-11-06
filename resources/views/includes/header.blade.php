<div class="site-mobile-menu">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar py-1" role="banner">

  <div class="container">
    <div class="row align-items-center">

      <div class="col-6 col-xl-2">
        <h1 class="mb-0"><a href="index.html" class="text-black h2 mb-0">Travelers</a></h1>
      </div>
      <div class="col-10 col-md-8 d-none d-xl-block">
        <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

          <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
            <li class="{{Request::routeIs('home') ? 'active' : ''}}">
              <a href="/">Home</a>
            </li>
            <li class="{{Request::routeIs('flight') ? 'active' : ''}}"><a href="{{ route('flight') }}">Flights</a></li>
            <li class="{{Request::routeIS('about') ? 'active' : ''}}"><a href="{{ route('about') }}">About</a></li>
            <li class="{{Request::routeIS('blog') ? 'active' : ''}}"><a href="{{ route('blog') }}">Blog</a></li>

            <li><a href="{{ route('contact') }}">Contact</a></li>
            @auth
            <li class="{{Request::routeIS('user.dashboard') ? 'active' : ''}}"><a href="{{ route('user.dashboard') }}">MyAccount</a></li>
            <li class="text-dark">@livewire('user-auth.logout')</li>
            @endauth
            @guest
            <li><a href="{{ route('registration') }}">Signup</a></li>
            @endguest
          </ul>
        </nav>
      </div>

      <div class="col-6 col-xl-2 text-right">
        <div class="d-none d-xl-inline-block">
          <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
            <li>
              <a href="#" class="pl-0 pr-3 text-black"><span class="icon-tripadvisor"></span></a>
            </li>
            <li>
              <a href="#" class="pl-3 pr-3 text-black"><span class="icon-twitter"></span></a>
            </li>
            <li>
              <a href="#" class="pl-3 pr-3 text-black"><span class="icon-facebook"></span></a>
            </li>
            <li>
              <a href="#" class="pl-3 pr-3 text-black"><span class="icon-instagram"></span></a>
            </li>

          </ul>
        </div>

        <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#"
            class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

      </div>

    </div>
  </div>

</header>
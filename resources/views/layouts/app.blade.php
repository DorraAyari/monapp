<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </main>
   <!-- ========================= FOOTER ========================= -->
<footer class="section-footer border-top bg">
    <div class="container">
      <section class="footer-top  padding-y">
        <div class="row">
          <aside class="col-md col-6">
            <h6 class="title">Brands</h6>
            <ul class="list-unstyled">
              <li> <a href="#">Adidas</a></li>
              <li> <a href="#">Puma</a></li>
              <li> <a href="#">Reebok</a></li>
              <li> <a href="#">Nike</a></li>
            </ul>
          </aside>
          <aside class="col-md col-6">
            <h6 class="title">Company</h6>
            <ul class="list-unstyled">
              <li> <a href="#">About us</a></li>
              <li> <a href="#">Career</a></li>
              <li> <a href="#">Find a store</a></li>
              <li> <a href="#">Rules and terms</a></li>
              <li> <a href="#">Sitemap</a></li>
            </ul>
          </aside>
          <aside class="col-md col-6">
            <h6 class="title">Help</h6>
            <ul class="list-unstyled">
              <li> <a href="#">Contact us</a></li>
              <li> <a href="#">Money refund</a></li>
              <li> <a href="#">Order status</a></li>
              <li> <a href="#">Shipping info</a></li>
              <li> <a href="#">Open dispute</a></li>
            </ul>
          </aside>
          <aside class="col-md col-6">
            <h6 class="title">Account</h6>
            <ul class="list-unstyled">
              <li> <a href="#"> User Login </a></li>
              <li> <a href="#"> User register </a></li>
              <li> <a href="#"> Account Setting </a></li>
              <li> <a href="#"> My Orders </a></li>
            </ul>
          </aside>
          <aside class="col-md">
            <h6 class="title">Social</h6>
            <ul class="list-unstyled">
              <li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
              <li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
              <li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
              <li><a href="#"> <i class="fab fa-youtube"></i> Youtube </a></li>
            </ul>
          </aside>
        </div> <!-- row.// -->
      </section>  <!-- footer-top.// -->
      <section class="footer-bottom row">
        <div class="col-md-2">
          <p class="text-muted">   2021 Company name </p>
        </div>
        <div class="col-md-8 text-md-center">
          <span  class="px-2">info@com</span>
          <span  class="px-2">+000-000-0000</span>
          <span  class="px-2">Street name 123, ABC</span>
        </div>
        <div class="col-md-2 text-md-right text-muted">
          <i class="fab fa-lg fa-cc-visa"></i> 
          <i class="fab fa-lg fa-cc-paypal"></i> 
          <i class="fab fa-lg fa-cc-mastercard"></i>
        </div>
      </section>
    </div><!-- //container -->
  </footer>
  <!-- ========================= FOOTER END // ========================= -->
</div>
    </div>
</body>
</html>

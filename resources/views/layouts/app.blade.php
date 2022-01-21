<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GetTheBest') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <i><b>GetTheBest</b></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column ml-lg-0 ml-3" id="navbarSupportedContent">              
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}"><strong>{{ __('Home') }}</strong></a>                               
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('books.index') }}"><strong>{{ __('Books') }}</strong></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}"><strong>about US</strong></a></li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><strong>{{ __('Login') }}</strong></a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><strong>{{ __('Register') }}</strong></a>
                                </li>
                            @endif
                        @else
                            @if(Auth::user()->role=="admin")
                                 <li class="nav-item">
                                    <a class="nav-link text-danger" href="{{ route('admin') }}"><strong>{{ __('Admin') }}</strong></a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <!-- Left Side Of Navbar -->                 
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav form-inline mx-auto"> 
                        <li>
                            <div class="dropdown show">                    
                                <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Shop by category
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach($categories as $categorie)
                                
                                    <a class="dropdown-item" href="{{ route('categories.show',$categorie) }}">{{$categorie->libelle }}</a>
                            
                                @endforeach

                                </div>  

                            </div>
                        </li>
                        <li>
                            <form class="form-inline" method="POST" action="{{ route('searchRes') }}">
                            @csrf
                                <div class="form-group">
                                    <input class="form-control" name="keyword"type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-primary btn-md my-2 my-sm-0 ml-3" type="submit">Search</button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>    
            </div>
        </nav>
  
        <main class="py-4">
            @yield('content')
        </main>
</div>
<!-- Footer -->
<footer class=" page-footer font-small bg-dark pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-white text-md-left">

    <!-- Footer links -->
    <div class="row text-center text-md-left mt-3 pb-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">GetTheBest</h6>
        <p>Getthebest offers quality used and new books, accurately graded, at everyday low prices, delivered directly to our cherished customers. If, for any reason you are not satisfied with your purchase, please contact us and we will do our best to ensure your satisfaction..</p>
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">
       <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
        <p>
          <a href="{{ route('about') }}">About us</a>
        </p>

        <p>
          <a href="#!">Contact us</a>
        </p>
        <p>
          <a href="#!">Help</a>
        </p>
      </div>

      <!-- Grid column -->
      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
        <p>
          <i class="fas fa-home mr-3"></i>Morocco Casablanca</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> GetTheBest@gmail.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> + 06 234 567 88</p>
        <p>
          <i class="fas fa-print mr-3"></i> + 06 234 567 89</p>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Footer links -->

    <hr>

    <!-- Grid row -->
    <div class="row d-flex align-items-center">

      <!-- Grid column -->
  <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://mdbootstrap.com/"> GetTheBest</a>
        </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-5 col-lg-4 ml-lg-0">

        <!-- Social buttons -->
        <div class="text-center text-md-right">
          <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-google-plus-g"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

</footer>
<!-- Footer -->
</body>
</html>
<!-- Book Depository (bookdepository.com) is a leading national  book and free delivery in all Morocco
Our vision is to provide “All Books Available to All” by improving selection, access and affordability of books. -->


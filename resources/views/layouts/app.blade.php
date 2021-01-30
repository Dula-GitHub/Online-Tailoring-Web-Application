<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Online Tailoring</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: whitesmoke;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">

                    <img src="../images/logo.png" width="80" height="80" class="d-inline-block align-top" alt="">
                <a class="navbar-brand" href="{{ url('/') }}" class="d-inline-block align-top" alt="">
                    
                    <b> Online Tailoring </b>
                </a>
                    <ul class="navbar-nav ml-auto">
                        @if(Auth::user())
                        <a class="nav-link" href="/place-order"style="color: #000; margin-left: 50px; background-color: rgb(210, 248, 243);border-color:  rgb(12, 72, 84); border-radius: 10px; text-align: center; padding: 14px 16px">Place Order</a></li>
                            @if(Auth::user()->user_role == 'admin')
                            
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #000; margin-left: 50px; background-color: rgb(210, 248, 243);border-color:  rgb(12, 72, 84); border-radius: 10px; text-align: center; padding: 14px 16px">
                                        Orders <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/orders">Pending Order</a>
                                        <a class="dropdown-item" href="/approved-orders">Approved Order</a>
                                        <a class="dropdown-item" href="/rejected-orders">Rejected Order</a>
                                        <a class="dropdown-item" href="/waiting-orders">Waiting Order</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #000; margin-left: 50px; background-color: rgb(210, 248, 243);border-color:  rgb(12, 72, 84); border-radius: 10px; text-align: center; padding: 14px 16px">
                                        Add New item <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/categories">Add New Categories</a>
                                        <a class="dropdown-item" href="/sub-categories">Add New Sub Categories</a>
                                        <a class="dropdown-item" href="/measurements">Add New Measurements</a>
                                        <a class="dropdown-item" href="/materials">Add New Materials</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item"><a class="nav-link" href="/inventories-items/1" style="color: #000; margin-left: 50px; background-color: rgb(210, 248, 243);border-color:  rgb(12, 72, 84); border-radius: 10px; text-align: center; padding: 16px 16px">Inventory</a></li>
                            @else
                                <li class="nav-item"><a class="nav-link" href="/orders" style="color: #000; margin-left: 50px; background-color: rgb(210, 248, 243);border-color:  rgb(12, 72, 84); border-radius: 10px; text-align: center; padding: 16px 16px">Pending Order</a></li>
                                <li class="nav-item"><a class="nav-link" href="/approved-orders" style="color: #000; margin-left: 50px; background-color: rgb(210, 248, 243);border-color:  rgb(12, 72, 84); border-radius: 10px; text-align: center; padding: 16px 16px">Approved Order</a></li>
                                <li class="nav-item"><a class="nav-link" href="/rejected-orders" style="color: #000; margin-left: 50px; background-color: rgb(210, 248, 243);border-color:  rgb(12, 72, 84); border-radius: 10px; text-align: center; padding: 16px 16px">Rejected Order</a></li>
                                <li class="nav-item"><a class="nav-link" href="/waiting-orders" style="color: #000; margin-left: 50px; background-color: rgb(210, 248, 243);border-color:  rgb(12, 72, 84); border-radius: 10px; text-align: center; padding: 16px 16px">Waiting Order</a></li>
                            @endif
                        @endif
                        
                    </ul>
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
                                <a class="nav-link" href="{{ route('login') }}"><b>{{ __('Login') }}</b></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><b>{{ __('Register') }}</b></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->user_name }} <span class="caret"></span>
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

        <main class="py-4" style="background-image: url('../images/bg1.jpg'); height: 100%; background-position: center; background-repeat: no-repeat; background-size: cover;">
            @yield('content')
        </main>
    </div>
    @yield('javascript')
</body>
</html>

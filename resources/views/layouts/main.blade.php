<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('main.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ '../public/js/plugin.js' }}"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="container-fluid">

        <div class="left-side">

            <div class="col-sm-3 sidenav">
                {{-- top user name and pic show --}}
                <div class="row align-items-start  top-menu">
                    {{-- name of user and pic --}}
                    <div class="col  user-name">
                        <div class="name-pic"><a class="nav-link " href="{{ route('profile') }}" style=" position: relative;">
                                    <img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width: 50px;
                                    height: 50px;
                                    top: 0; left:5px; position: absolute; border-radius: 50%;
                                    margin-right: 25px;">
                                        {{ Auth::user()->name }} 
                                </a></div>
                    </div>
                </div>
                <hr>

                <nav class="navigation">
                    <ul class="mainmenu">
                        <li><a href="{{ route('todo.index') }}">TODO</a>
                            {{-- <ul class="submenu">
                                <li><a href="{{ route('todo.create') }}">ADD NEW TASK</a></li>
                                <li><a href="{{ route('todo.edit',$todo->id) }}">EDIT TASK</a></li>
                            </ul> --}}
                        </li>
                        <li><a href="{{ route('date.index') }}">DAYs</a></li>
                        <li><a href="{{ route('todo.status') }}">FINSHED</a>

                        </li>

                    </ul>
                </nav>



                <hr>

                <div class="logout">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf
                    </form>
                </div>
                




            </div>
        </div>


        {{-- right-side --}}
        <div class="col-sm-9 right-side">
            <div class="row align-items-start top-right">
                <div class="col img-head-overly">
                    <div class="head-overly"></div>
                    <h1 class="header-title">@yield('title')</h1>
                    <img class="img-header" src="/uploads/imgs/header.jpg">
                </div>
            </div>
            <div class="row align-items-center center-content">
                <div class="col content-right">


                    <main class="py-4">
                        @yield('content')
                    </main>

                </div>

            </div>
        </div>
    </div>

{{-- 
    <script >
            
           </script> --}}
</body>

</html>
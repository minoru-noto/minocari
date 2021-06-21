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

    <!-----Font Awesome------>
    <script src="https://kit.fontawesome.com/fbeec66651
.js" crossorigin="anonymous"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/item') }}">
                   <img src="{{asset('img/logo_01.png')}}" width="110px" height="50px;" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    
                    


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mt-3">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li  class="nav-item" style="margin-right:80px;">
                            <div class="" style="position:relative;">
                                <form method="POST" action="{{route('category.search')}}">
                                @csrf
                                    <div class="form-group">
                                            <select class="form-control" id="number" name="category">
                                                <option value="" selected="selected">カテゴリーを検索</option>


                                            @foreach($categories as  $category)


                                                @if($category->major_name == 'メンズ')
                                                    <option value="{{$category->id}}">{{$category->name}}(メンズ)</option>
                                                @endif

                                                @if($category->major_name == 'レディース')
                                                    <option value="{{$category->id}}">{{$category->name}}(レディース)</option>
                                                @endif

                                                @if($category->major_name == 'ベビー・キッズ')
                                                    <option value="{{$category->id}}">{{$category->name}}(ベビー・キッズ)</option>
                                                @endif

                                                @if($category->major_name == 'その他')
                                                    <option value="{{$category->id}}">{{$category->name}}(その他)</option>
                                                @endif

                                                
                                            @endforeach


                                            </select>
                                    </div>

                                    <div class="form-group" style="position:absolute;top:0px;right:-40px;">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>

                                </form>
                            </div>
                            </li>
                            <li class="nav-item">
                                <img src="{{asset('img/user_01.png')}}" alt="" class="img-thumbnail rounded-circle" style="width:40px;height:40px;">
                            </li>
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
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PPS') }}</title>

  <!--   <!-- include summernote css/js -->
<!-- <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script> --> -->

    <!-- Scripts -->
    <script src="{{ asset('js/toastr.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="{{ asset('js/summernote.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'P.P.S App') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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

        <div class="container">
        <div class= "row">

        @if(Auth::user())

       <div class= "col-lg-4">

       <ul class="list-group">
          <li class="list-group-item">
              <a href="{{ route('home')}}">Home</a>
          </li>
              

              @if(Auth::user()->admin||Auth::user()->id==1)

                  <li class="list-group-item">
                  <a href="{{ route('users')}}">Users</a>
              </li>

              <li class="list-group-item">
                  <a href="{{ route('user.create')}}">Create New User</a>
              </li>


              @endif

              <li class="list-group-item">
                  <a href="{{ route('user.profile')}}">My Profile</a>
              </li>

              <li class="list-group-item">
              <a href="{{ route('category.create')}}">Create New Category</a>
          </li>

           <li class="list-group-item">
              <a href="{{ route('categories')}}">Categories</a>
          </li>


            <li class="list-group-item">
              <a href="{{ route('tag.create')}}">Create New Tag</a>
          </li>

          
              <li class="list-group-item">
              <a href="{{ route('tags')}}">All Tags</a>
          </li>


          <li class="list-group-item">
              <a href="{{ route('post.create')}}">Create new Post</a>
          </li>
              


          <li class="list-group-item">
              <a href="{{ route('posts')}}">All Posts</a>
          </li>
              
               <li class="list-group-item">
              <a href="{{ route('post.trashed')}}">All Trashed Posts</a>
          </li>
              
              
              
         

          </ul> 

       </div>

       @endif

       
           <div class= "col-lg-8">
            <div class="list-group-item">
         
            @yield('content')
        
        </div>     

       </div>
               
        </div>
            

        </div>

        <script src="{{ asset('js/toastr.min.js') }}" defer></script>

        <script>
            
            @if(Session::has('success'))

            toastr.success("{{ Session::get('success')}}")

            @endif

            @if(Session::has('info'))

            toastr.info("{{ Session::get('info')}}")

            @endif

            @if(Session::has('danger'))

            toastr.danger("{{ Session::get('danger')}}")

            @endif

        </script>

         


    </div>


</body>
</html>

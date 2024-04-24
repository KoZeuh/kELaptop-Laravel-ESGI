<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'kFruitables') }}</title>

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        @php
            $currentPath = request()->path();
            $currentUser = auth()->user();
        @endphp
    </head>
    <body>
        <div id="app">
            <!--Main Navigation-->
            <header>
                <!-- Jumbotron -->
                <div class="p-3 text-center bg-white border-bottom">
                    <div class="container">
                        <div class="row">
                            <!-- Left elements -->
                            <div class="col-md-4 d-flex justify-content-center justify-content-md-start mb-3 mb-md-0">
                                <a href="{{url('/')}}" class="ms-md-2">
                                    <img src="https://files.oaiusercontent.com/file-H5KB9U87SrEieZ6CrDe1kj1k?se=2024-04-23T14%3A54%3A42Z&sp=r&sv=2021-08-06&sr=b&rscc=max-age%3D31536000%2C%20immutable&rscd=attachment%3B%20filename%3D28b06d0f-a518-4c73-8a52-8de8f7e5168b.webp&sig=GWWssetqeGBzlMYP0Z8EOFLFNPwLw5p7lcikfXLqq34%3D" height="35" />
                                </a>
                            </div>
                            <!-- Left elements -->

                            <!-- Center elements -->
                            <div class="col-md-4">
                                <form class="d-flex input-group w-auto my-auto mb-3 mb-md-0">
                                    <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" />
                                    <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
                                </form>
                            </div>
                            <!-- Center elements -->

                            <!-- Right elements -->
                            <div class="col-md-4 d-flex justify-content-center justify-content-md-end align-items-center">
                                <div class="d-flex">
                                    <!-- Cart -->
                                    <a class="text-reset me-3" href="{{ url('/cart') }}">
                                        <span><i class="fas fa-shopping-cart"></i></span>
                                        <span class="badge rounded-pill badge-notification bg-danger">@auth {{$currentUser->cartItems->count()}} @else 0 @endauth</span>
                                    </a>


                                    <!-- User -->
                                    <div class="dropdown">
                                        <a class="text-reset dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                                            id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                            <img src="img/avatar.png" class="rounded-circle" height="22"/>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                            <li><a class="dropdown-item" href="#">My profile</a></li>
                                            <li><a class="dropdown-item" href="#">Settings</a></li>
                                            <li><a class="dropdown-item" href="#">Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Right elements -->
                        </div>
                    </div>
                </div>
                <!-- Jumbotron -->

                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white">
                    <!-- Container wrapper -->
                    <div class="container justify-content-center justify-content-md-between">
                        <!-- Left links -->
                        <ul class="navbar-nav flex-row">
                            <li class="nav-item me-2 me-lg-0">
                                <a class="nav-link" href="#" role="button" data-mdb-toggle="sidenav" data-mdb-target="#sidenav-1"
                                    class="btn shadow-0 p-0 me-3" aria-controls="#sidenav-1" aria-haspopup="true">
                                    <i class="fas fa-bars me-1"></i>
                                    <span>Catégories</span>
                                </a>
                            </li>
                            @auth
                                @foreach ($categories as $category)
                                    @if ($category->parent_id == null)
                                        <li class="nav-item me-2 me-lg-0">
                                            <a class="nav-link" href="#">{{ $category->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endauth
                        </ul>
                        <!-- Left links -->

                        <button class="btn btn-outline-primary" data-mdb-ripple-color="dark" type="button">
                            Download app<i class="fas fa-download ms-2"></i>
                        </button>
                    </div>
                    <!-- Container wrapper -->
                </nav>
                <!-- Navbar -->

            </header>

            @if ($errors->any())
                <div class="col-sm-12 text-center">
                    <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <span><p>{{ $error }}</p></span>
                        @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="col-sm-12 text-center">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="col-sm-12 text-center">
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                </div>
            @endif

            <main class="py-4">
                @yield('content')
            </main>

            <footer class="text-center text-white mt-4" style="background-color: #607D8B">
                <hr class="text-dark">
            
                <div class="container">
                    <!-- Section: Social media -->
                    <section class="mb-3">
                
                        <!-- Facebook -->
                        <a
                            class="btn-link btn-floating btn-lg text-white"
                            href="#!"
                            role="button"
                            data-mdb-ripple-color="dark"
                            ><i class="fab fa-facebook-f"></i
                        ></a>
        
                        <!-- Twitter -->
                        <a
                        class="btn-link btn-floating btn-lg text-white"
                        href="#!"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fab fa-twitter"></i
                        ></a>
        
                        <!-- Google -->
                        <a
                        class="btn-link btn-floating btn-lg text-white"
                        href="#!"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fab fa-google"></i
                        ></a>
                
                        <!-- Instagram -->
                        <a
                        class="btn-link btn-floating btn-lg text-white"
                        href="#!"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fab fa-instagram"></i
                        ></a>
                
                        <!-- YouTube -->
                        <a
                        class="btn-link btn-floating btn-lg text-white"
                        href="#!"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fab fa-youtube"></i
                        ></a>
                        <!-- Github -->
                        <a
                        class="btn-link btn-floating btn-lg text-white"
                        href="#!"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fab fa-github"></i
                        ></a>
                    </section>
                    <!-- Section: Social media -->
                </div>
                <!-- Grid container -->
        
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2); text-color: #E0E0E0">
                    © 2022 Copyright:
                    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                </div>
                <!-- Copyright -->
            </footer>
        </div>
    </body>
</html>
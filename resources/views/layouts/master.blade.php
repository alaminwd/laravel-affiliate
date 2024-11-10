<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('header')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">

    @toastifyCss
    @toastifyJs
</head>

<body>

    <!-- =================== header foot start ======================= -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <img id="logoImg" src="" width="100" class="img-fluid w-100" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item "> <a class="nav-link  " href="{{url('/about-us')}}">About</a></li>
                    <li class="nav-item "> <a class="nav-link  " href="{{url('/blog')}}">Blog</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropDown">
                            @foreach (App\Models\Category::all() as $category)
                            <li><a class="dropdown-item"
                                    href="{{url('single-category/' . $category->slug)}}">{{$category->category_name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item "> <a class="nav-link  " href="{{url('/contact')}}">Contact</a></li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" id="search_input" type="search" placeholder="Search"
                        aria-label="Search">
                    <button id="search_btn" type="button"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>
    <!-- =================== header foot end ======================= -->

    @yield('content')


    <!-- ===================================
            contact part start
    ==================================== -->
    <section id="contact-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="left">
                        <div class="foot_logo">
                            <a href="{{url('/')}}"><img id="footLogo" src="" alt="footerlogo"></a>
                        </div>
                        <p class="footer_left_desp"></p>
                        <ul>
                            <li><a class="footer_fb" href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="footer_twet" href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a class="footer_link" href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            <li><a class="footer_ins" href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="center">
                        <h2>Quick Links</h2>
                        <div class="row">
                            <div class="col-lg-10">
                                <ul id="footerMenu">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="right">
                        <h2>Contact Informations</h2>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <div class="icon">
                                    <ul>
                                        <li><a><i class="fas fa-home"></i></a></li>
                                        <li><a><i class="fas fa-phone"></i></a></li>
                                        <li><a><i class="fas fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-10 p-0 ">
                                <div class="address">
                                    <h3>Location</h3>
                                    <p class="footer_address"></p>
                                    <h3>Phone</h3>
                                    <p class="footer_number"></p>
                                    <h3>E-mail</h3>
                                    <p class="footer_mail"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ===================================
          footer part start
  ==================================== -->
    <footer>
        <p>Affiliat <i class="fas fa-copyright"></i> 2018. All rights reserved by <span> Developer Al Amin</span></p>
    </footer>





    <script src="{{asset('frontend/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/js/slick.min.js')}}"></script>
    <script src="{{asset('frontend/js/script.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    <script src="{{asset('frontend/js/frontend.js')}}"></script>
    @yield('footer_script')
</body>

</html>

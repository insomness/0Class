<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('frontTemplate')}}/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontTemplate')}}/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('frontTemplate')}}/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('frontTemplate')}}/css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{asset('frontTemplate')}}/css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('frontTemplate')}}/css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('frontTemplate')}}/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('frontTemplate')}}/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('frontTemplate')}}/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    @stack('link')
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="/"><img src="{{asset('frontTemplate\img\logo.png')}}"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('index')}}">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href=" {{route('kelas.index')}} ">Kelas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('podcast.index')}}">Podcast</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('blog.index')}}">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('about')}}">Tentang Kami</a>
                                </li>
                            @guest
                                <li class="d-none d-lg-block">
                                    <a class="btn_1" href="{{route('login')}}">Masuk</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @if (auth()->user()->role == 'admin')
                                            <a href="{{route('admin.dashboard')}}" class="dropdown-item">Admin dashboard</a>
                                        @else
                                            <a href="{{route('akun.detail')}}" class="dropdown-item">Akun</a>
                                            @if (auth()->user()->role == 'regular')
                                                <a href="{{route('upgrade_premium')}}" class="dropdown-item">Upgrade premium</a>
                                            @endif
                                        @endif

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
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    @yield('content')

    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget footer_1">
                        <h4>Kelas Kita</h4>
                        <p>Platform e-learning untuk mencerdaskan masyarakat Indonesia</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Social Media</h4>
                        <div class="social_icon">
                            <a href="#"> <i class="ti-facebook"></i> </a>
                            <a href="#"> <i class="ti-twitter-alt"></i> </a>
                            <a href="#"> <i class="ti-instagram"></i> </a>
                            <a href="#"> <i class="ti-skype"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Hubungi Kami</h4>
                        <div class="contact_info">
                            <p><span> Ponsel :</span> +628 515 672 0890</p>
                            <p><span> Email  : </span> fitrahmaulana111@gmail.com </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> | Developed by Fitrah Maulana
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{asset('frontTemplate')}}/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="{{asset('frontTemplate')}}/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{asset('frontTemplate')}}/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="{{asset('frontTemplate')}}/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="{{asset('frontTemplate')}}/js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="{{asset('frontTemplate')}}/js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="{{asset('frontTemplate')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontTemplate')}}/js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="{{asset('frontTemplate')}}/js/slick.min.js"></script>
    <script src="{{asset('frontTemplate')}}/js/jquery.counterup.min.js"></script>
    <script src="{{asset('frontTemplate')}}/js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="{{asset('frontTemplate')}}/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @if(session('status'))
    <script>
        Swal.fire({
            title: 'Sukses ...!',
            text: '{{ session("status")}}',
            icon: 'success',
            showClass: {
                popup: 'animate__animated animate__backInLeft'
            },
            hideClass: {
                popup: 'animate__animated animate__backOutRight'
            }
        });
    </script>
    @endif
    @stack('scripts')
</body>

</html>

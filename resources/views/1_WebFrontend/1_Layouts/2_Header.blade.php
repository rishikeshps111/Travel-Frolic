<header class="main_header_area">
    <div class="header-content py-1 bg-theme">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="links">
                <ul>
                    <li>
                        <a href="#" class="white">
                            <i class="icon-calendar white"></i>
                            {{ \Carbon\Carbon::now()->format('l, M d, Y') }}
                        </a>
                    </li>
                    <li><a href="#" class="white"><i class="icon-location-pin white"></i> Aluva,
                            Kerala</a>
                    </li>
                    {{-- <li><a href="#" class="white"><i class="icon-clock white"></i> Mon-Fri: 10 AM – 5 PM</a>
                    </li> --}}
                </ul>
            </div>
            <div class="links float-right">
                <ul>
                    <li><a href="#" class="white"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="white"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/thetravelfrolic?igsh=ZmVkbGp1Y3Ztem1h" class="white"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="#" class="white"><i class="fab fa-linkedin " aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header_menu" id="header_menu">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-3 pt-3">

                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{ asset('1_WebFrontend/images/logo1.png') }}" alt="image">
                        </a>
                    </div>

                    <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" id="responsive-menu">
                            <li class="dropdown submenu active">
                                <a href="{{ route('IndexView') }}" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                            </li>
                            <li class="submenu dropdown">
                                <a href="{{ route('TourView') }}" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Tours</a>
                            </li>

                            <li class="submenu dropdown">
                                <a href="{{ route('DestinationView') }}" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Destinations </a>
                            </li>
                            <li><a href="{{ route('AboutView') }}">About Us</a></li>
                            <li><a href="{{ route('GalleryView') }}">Gallery</a></li>
                            <li><a href="{{ route('ContactView') }}">Contact Us</a></li>

                        </ul>
                    </div>
                    <div id="slicknav-mobile"></div>
                </div>
            </div>
        </nav>
    </div>

</header>

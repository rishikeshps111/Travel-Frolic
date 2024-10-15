<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<!-- Mirrored from htmldesigntemplates.com/html/travelin/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2024 06:50:42 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title>TravelFrolic - Travel Tour Booking</title>

    <link rel="shortcut icon" type="image/x-icon" href="/1_WebFrontend/images/favicon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

    <link href="{{ asset('1_WebFrontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('1_WebFrontend/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('1_WebFrontend/css/plugin.css') }}" rel="stylesheet" type="text/css">



    <link rel="stylesheet" href="{{ asset('1_WebFrontend/fonts/line-icons.css') }}" type="text/css">
</head>

<body>
    @yield('preloader')

    @include('1_WebFrontend.1_Layouts.2_Header')

    @yield('content')

    @include('1_WebFrontend.1_Layouts.3_Footer')


    <div id="back-to-top">
        <a href="#"></a>
    </div>


    <div id="search1">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <div class="modal fade log-reg" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="post-tabs">

                        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button aria-controls="login" aria-selected="false" class="nav-link active"
                                    data-bs-target="#login" data-bs-toggle="tab" id="login-tab" role="tab"
                                    type="button">Login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button aria-controls="register" aria-selected="true" class="nav-link"
                                    data-bs-target="#register" data-bs-toggle="tab" id="register-tab" role="tab"
                                    type="button">Register</button>
                            </li>
                        </ul>

                        <div class="tab-content blog-full" id="postsTabContent">

                            <div aria-labelledby="login-tab" class="tab-pane fade active show" id="login"
                                role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="blog-image rounded">
                                            <a href="#"
                                                style="background-image: url(/1_WebFrontend/images/trending/trending5.jpg);"></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="text-center border-b pb-2">Login</h4>
                                        <div class="log-reg-button d-flex align-items-center justify-content-between">
                                            <button type="submit" class="btn btn-fb">
                                                <i class="fab fa-facebook"></i> Login with Facebook
                                            </button>
                                            <button type="submit" class="btn btn-google">
                                                <i class="fab fa-google"></i> Login with Google
                                            </button>
                                        </div>
                                        <hr class="log-reg-hr position-relative my-4 overflow-visible">
                                        <form method="post" action="#" name="contactform" id="contactform">
                                            <div class="form-group mb-2">
                                                <input type="text" name="user_name" class="form-control"
                                                    id="fname" placeholder="User Name or Email Address">
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="password" name="password_name" class="form-control"
                                                    id="lpass" placeholder="Password">
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="exampleCheck">
                                                <label class="custom-control-label mb-0" for="exampleCheck1">Remember
                                                    me</label>
                                                <a class="float-end" href="#">Lost your password?</a>
                                            </div>
                                            <div class="comment-btn mb-2 pb-2 text-center border-b">
                                                <input type="submit" class="nir-btn w-100" id="submit"
                                                    value="Login">
                                            </div>
                                            <p class="text-center">Don't have an account? <a href="#"
                                                    class="theme">Register</a></p>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div aria-labelledby="register-tab" class="tab-pane fade" id="register"
                                role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="blog-image rounded">
                                            <a href="#"
                                                style="background-image: url(/1_WebFrontend/images/trending/trending5.jpg);"></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="text-center border-b pb-2">Register</h4>
                                        <div class="log-reg-button d-flex align-items-center justify-content-between">
                                            <button type="submit" class="btn btn-fb">
                                                <i class="fab fa-facebook"></i> Login with Facebook
                                            </button>
                                            <button type="submit" class="btn btn-google">
                                                <i class="fab fa-google"></i> Login with Google
                                            </button>
                                        </div>
                                        <hr class="log-reg-hr position-relative my-4 overflow-visible">
                                        <form method="post" action="#" name="contactform1" id="contactform1">
                                            <div class="form-group mb-2">
                                                <input type="text" name="user_name" class="form-control"
                                                    id="fname1" placeholder="User Name">
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="text" name="user_name" class="form-control"
                                                    id="femail" placeholder="Email Address">
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="password" name="password_name" class="form-control"
                                                    id="lpass1" placeholder="Password">
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="password" name="password_name" class="form-control"
                                                    id="lrepass" placeholder="Re-enter Password">
                                            </div>
                                            <div class="form-group mb-2 d-flex">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="exampleCheck1">
                                                <label class="custom-control-label mb-0 ms-1 lh-1"
                                                    for="exampleCheck1">I
                                                    have read and accept the Terms and Privacy Policy?</label>
                                            </div>
                                            <div class="comment-btn mb-2 pb-2 text-center border-b">
                                                <input type="submit" class="nir-btn w-100" id="submit1"
                                                    value="Register">
                                            </div>
                                            <p class="text-center">Already have an account? <a href="#"
                                                    class="theme">Login</a></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
    <script src="{{ asset('1_WebFrontend/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('1_WebFrontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('1_WebFrontend/js/particles.js') }}"></script>
    <script src="{{ asset('1_WebFrontend/js/custom-accordian.js') }}"></script>
    <script src="{{ asset('1_WebFrontend/js/particlerun.js') }}"></script>
    <script src="{{ asset('1_WebFrontend/js/plugin.js') }}"></script>
    <script src="{{ asset('1_WebFrontend/js/main.js') }}"></script>
    <script src="{{ asset('1_WebFrontend/js/custom-swiper.js') }}"></script>
    <script src="{{ asset('1_WebFrontend/js/custom-nav.js') }}"></script>
    <script src="{{ asset('1_WebFrontend/js/app.js') }}"></script>

    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'8a2756580cde1191',t:'MTcyMDg1MzQxMS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='../../cdn-cgi/challenge-platform/h/g/scripts/jsd/7a55c9ccbaaa/maind41d.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"8a2756580cde1191","version":"2024.6.1","r":1,"serverTiming":{"name":{"cfL4":true}},"token":"e2e296138d64407b8469055f5cbf0b42","b":1}'
        crossorigin="anonymous"></script>
    @if (is_file(public_path('1_WebFrontend/PageConfigs/' . PageName() . '.js')))
        <script src="{{ asset('1_WebFrontend/PageConfigs/' . PageName() . '.js') }}"></script>
    @endif
</body>

<!-- Mirrored from htmldesigntemplates.com/html/travelin/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2024 06:50:44 GMT -->

</html>

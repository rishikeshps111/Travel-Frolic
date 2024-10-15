<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<!-- Mirrored from htmldesigntemplates.com/html/travelin/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2024 06:50:42 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TravelFrolic - Travel Tour Booking</title>

    <link rel="shortcut icon" type="image/x-icon" href="1_WebFrontend/images/favicon.png">

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

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
    <script src="{{ asset('1_WebFrontend/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('1_WebFrontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('1_WebFrontend/js/particles.js') }}"></script>
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

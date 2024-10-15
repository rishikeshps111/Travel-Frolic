<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmldesigntemplates.com/html/travelin/dashboard/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2024 06:51:22 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Travelin Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="Travelin">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Travelin - Travel Tour Booking HTML Templates</title>

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.6.1/build/css/intlTelInput.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    {{-- <link rel="stylesheet" href="{{ asset('2_AdminPanel/vendors/dropzone/dropzone.min.css') }}" type="text/css" /> --}}
    <link rel="stylesheet" href="{{ asset('2_AdminPanel/css/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('2_AdminPanel/vendors/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('2_AdminPanel/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('2_AdminPanel/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('2_AdminPanel/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('2_AdminPanel/images/favicon.png') }}" />


</head>

<body>
    <div class="main-wrapper">
        @include('2_AdminPanel.1_Layouts.4_Sidebar')

        <div class="page-wrapper">

            @include('2_AdminPanel.1_Layouts.2_Header')

            @yield('content')

            @include('2_AdminPanel.1_Layouts.3_Footer')

        </div>


    </div>

    @include('2_AdminPanel.3_Components.CommonModal.CommonModal')





    {{-- <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
    <script src="{{ asset('2_AdminPanel/vendors/core/core.js') }}"></script>


    <script src="{{ asset('2_AdminPanel/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('2_AdminPanel/vendors/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('2_AdminPanel/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('2_AdminPanel/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('2_AdminPanel/vendors/apexcharts/apexcharts.min.js') }}"></script>


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.6.1/build/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>


    <script src="{{ asset('2_AdminPanel/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('2_AdminPanel/js/template.js') }}"></script>


    <script src="{{ asset('2_AdminPanel/js/dashboard-light.js') }}"></script>
    <script src="{{ asset('2_AdminPanel/js/datepicker.js') }}"></script>
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'8a275699ad0f1191',t:'MTcyMDg1MzQyMS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='../../../cdn-cgi/challenge-platform/h/g/scripts/jsd/7a55c9ccbaaa/maind41d.js';document.getElementsByTagName('head')[0].appendChild(a);";
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
        data-cf-beacon='{"rayId":"8a275699ad0f1191","version":"2024.6.1","r":1,"serverTiming":{"name":{"cfL4":true}},"token":"e2e296138d64407b8469055f5cbf0b42","b":1}'
        crossorigin="anonymous"></script>
    <script src="{{ asset('2_AdminPanel/js/main.js') }}"></script>
    @if (is_file(public_path('2_AdminPanel/PageConfigs/' . PageName() . '.js')))
        <script src="{{ asset('2_AdminPanel/PageConfigs/' . PageName() . '.js') }}"></script>
    @endif
    <script src="{{ asset('2_AdminPanel/PageConfigs/AuthUser.js') }}"></script>

</body>

<!-- Mirrored from htmldesigntemplates.com/html/travelin/dashboard/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2024 06:51:31 GMT -->

</html>

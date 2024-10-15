<footer class="pt-20 pb-4" style="background-image: url(/1_WebFrontend/images/background_pattern.png);">
    <div class="section-shape top-0" style="background-image: url(/1_WebFrontend/images/shape8.png);"></div>

    <div class="insta-main pb-10">
        <div class="container">
            <div class="insta-inner">
                <div class="follow-button">
                    <a href="https://www.instagram.com/thetravelfrolic?igsh=ZmVkbGp1Y3Ztem1h" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        <h5 class="m-0 rounded"><i class="fab fa-instagram"></i> Follow on Instagram</h5>
                    </a>
                </div>
                <div class="row attract-slider">
                    @foreach ($images as $image)
                        <div class="col-md-3 col-sm-6">
                            <div class="insta-image rounded">
                                <a><img src="/storage/file_uploads/gallery/{{ $image->id }}/{{ $image->image }}"
                                        alt="insta"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="footer-upper pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-12 mb-4 pe-4">
                    <div class="footer-about">
                        <img src="1_WebFrontend/images/logo-white1.png" alt>
                        <p class="mt-3 mb-3 white">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odio suspendisse leo neque
                            iaculis molestie sagittis maecenas aenean eget molestie sagittis.
                        </p>
                        <ul>
                            <li class="white"><strong>PO Box:</strong> +91 73569 90225</li>
                            <li class="white"><strong>Location:</strong> Aluva - 680543, Kerala, India</li>
                            <li class="white"><strong>Email:</strong> <a
                                    href="https://htmldesigntemplates.com/cdn-cgi/l/email-protection"
                                    class="__cf_email__"
                                    data-cfemail="8ae3e4ece5cadef8ebfcefe6e3e4a4e9e5e7">[email&#160;protected]</a>
                            </li>
                            <li class="white"><strong>Website:</strong> www.travelfrolic.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 mb-4">
                    <div class="footer-links">
                        <h3 class="white">Quick link</h3>
                        <ul>
                            <li><a href="{{ route('IndexView') }}">Home</a></li>
                            <li><a href="{{ route('TourView') }}">Tours</a></li>
                            <li><a href="{{ route('DestinationView') }}">Destinations</a></li>
                            <li><a href="{{ route('AboutView') }}">About Us</a></li>
                            <li><a href="{{ route('GalleryView') }}">Gallery</a></li>
                            <li><a href="{{ route('ContactView') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 mb-4">
                    <div class="footer-links">
                        <h3 class="white">Our Destinations</h3>
                        <ul>
                            @foreach ($footer_destinations as $footer_destination)
                                <li>{{ $footer_destination->place_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-payment">
        <div class="container">
            <div class="row footer-pay align-items-center justify-content-between text-lg-start text-center">
                <div class="col-lg-8 footer-payment-nav mb-4">
                    <ul class>
                        <li class="me-2">We Support:</li>
                        <li class="me-2"><i class="fab fa-cc-mastercard fs-4"></i></li>
                        <li class="me-2"><i class="fab fa-cc-paypal fs-4"></i></li>
                        <li class="me-2"><i class="fab fa-cc-stripe fs-4"></i></li>
                        <li class="me-2"><i class="fab fa-cc-visa fs-4"></i></li>
                        <li class="me-2"><i class="fab fa-cc-discover fs-4"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="copyright-inner rounded p-3 d-md-flex align-items-center justify-content-between">
                <div class="copyright-text">
                    <p class="m-0 white">2024 TraveFrolic. All rights reserved.</p>
                </div>
                <div class="social-links">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/thetravelfrolic?igsh=ZmVkbGp1Y3Ztem1h"><i
                                    class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
    {{-- <div class="fixed_footer pt-3 pb-3">
        <ul>
            <li>
                <p> <a class="nir-btn" href="#"><i class="bi bi-envelope-open"></i> Call Now</a> </p>
            </li>
            <li>
                <p> <a class="nir-btn" href="#"><i class="bi bi-envelope-open"></i> Enquire Now</a> </p>
            </li>
            <li>
                <p> <a class="nir-btn"
                        href="https://api.whatsapp.com/send?phone=+919142590404&amp;text=Share%20me%20package%20details"
                        target="_blank"><i class="bi bi-whatsapp"></i> WhatsApp</a> </p>
            </li>
        </ul>
    </div> --}}


</footer>
<div class="sticky-footer nav-down">
    <div class="d-flex justify-content-center footer-nav">
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><img class="image-icon"
                src="/1_WebFrontend/images/comments.png" alt="profile"></a>
        <a href="https://api.whatsapp.com/send?phone=+917356990225&amp;text=Share%20me%20package%20details"><img
                class="image-icon" src="/1_WebFrontend/images/whatsapp.png" alt="profile"></a>
        <a href="tel:+917356990225"><img class="image-icon" src="/1_WebFrontend/images/telephone.png"
                alt="profile"></a>
    </div>

</div>


<div class="modal fade log-reg" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="post-tabs">

                    <div class="tab-content blog-full" id="postsTabContent">

                        <div aria-labelledby="login-tab" class="tab-pane fade active show" id="login"
                            role="tabpanel">
                            <button type="button" class="btn-close ms-10" data-bs-dismiss="modal"
                                aria-label="Close"></button>

                            <div class="row">

                                <div class="col-lg-12">
                                    <h4 class="text-center border-b pb-2">Enquire Now</h4>

                                    <form method="post" action="#" name="contactform" id="contactform">
                                        <div class="form-group mb-2">
                                            <input type="text" name="user_name" class="form-control"
                                                id="fname" placeholder="Enter the Name">
                                        </div>
                                        <div class="form-group mb-2">
                                            <input type="email" name="password_name" class="form-control"
                                                id="lpass" placeholder="Enter the Email">
                                        </div>
                                        <div class="form-group mb-2">
                                            <input type="text" name="user_name" class="form-control"
                                                id="fname" placeholder="Enter the Phone">
                                        </div>
                                        {{-- <div class="form-group mb-2">
                                                <input type="text" name="user_name" class="form-control" id="fname"
                                                    placeholder="User Name or Email Address">
                                            </div> --}}
                                        <div class="textarea mb-2">
                                            <textarea name="comments" placeholder="Enter a message"></textarea>
                                        </div>
                                        <div class="comment-btn mb-2 pb-2 text-center border-b">
                                            <input type="submit" class="nir-btn w-100" id="submit"
                                                value="Submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div aria-labelledby="register-tab" class="tab-pane fade" id="register" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="blog-image rounded">
                                        <a href="#"
                                            style="background-image: url(images/trending/trending5.jpg);"></a>
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
                                            <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                            <label class="custom-control-label mb-0 ms-1 lh-1" for="exampleCheck1">I
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

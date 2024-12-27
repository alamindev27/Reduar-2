@extends('layouts.app')
@section('styles')
    <title>Home | {{ setting()->site_title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
@endsection
@section('content')
    <div id="main">
        <div class="container-fluid">
            <div class="container">

                <div class="row py-3 mb-3 align-items-center justify-content-center"
                    style="border-radius: 5px; background: linear-gradient(180deg, rgba(242, 240, 238, 0.5) 0%, rgba(250, 209, 214, 0.5) 100%);">
                    <div class="col-lg-6 text-center">
                        <h1>Advertising</h1>
                        <p class="text-dark">Promote your Forex brokerage <br>
                             globally with our advanced advertising <br> and marketing solutions.</p>
                        <a href="mailto:" class="btn bg-secondary text-white text-uppercase">Get Started</a>
                        <a href="{{ route('frontend.mediaKit') }}" class="btn bg-secondary text-white text-uppercase">Media
                            Kit</a>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/frontend/img/advertising.svg') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12 text-center">
                        <span class="text-uppercase">OUR SOLUTIONS</span>
                        <h3 class="fw-bold">Dynamic Marketing Solutions</h3>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row py-4 justify-content-center">
                                <div class="col-lg-3 text-center mb-3">
                                    <img src="{{ asset('assets/frontend/img/branding.svg') }}" alt=""
                                        class="img-fluid" width="80">
                                    <h4>Branding</h4>
                                    <small>Our Forex Broker Branding Service is designed to elevate your business, ensuring it stands out in the competitive global market.</small>
                                </div>
                                <div class="col-lg-3 text-center mb-3">
                                    <img src="{{ asset('assets/frontend/img/banner.svg') }}" alt=""
                                        class="img-fluid" width="80">
                                    <h4>Banner Ads</h4>
                                    <small>Dynamic banner placements enhance visibility and achieve campaign goals. Showcase your brand to traders worldwide with high-impact banner ads.</small>
                                </div>
                                <div class="col-lg-3 text-center mb-3">
                                    <img src="{{ asset('assets/frontend/img/list.svg') }}" alt="" class="img-fluid"
                                        width="80">
                                    <h4>Brokers Listing</h4>
                                    <small>Get featured in our top broker sections, ensuring traders can easily find and trust your services. Appear prominently on the homepage and across all pages.</small>
                                </div>
                                <div class="col-lg-3 text-center mb-3">
                                    <img src="{{ asset('assets/frontend/img/postcard.svg') }}" alt=""
                                        class="img-fluid" width="80">
                                    <h4>Guest Posting</h4>
                                    <small>Publish paid articles, including broker press releases, bonus promotions, live/demo contests, reviews, or general Forex-related content, to engage your target audience effectively.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row  my-3">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 mb-3 p-3">
                                    <div
                                        style="position: relative; top:50%; left:0%;width:100%;transform:translateY(-50%);">
                                        <small class="fw-bold">Get In Touch</small>
                                        <h3 class="fw-bold mt-3">We Look Forward to Connecting and Understanding Your Business Needs.</h3>
                                        <p class="mt-4">Our team is dedicated to offering quick and efficient support 24/7. We value your feedback, as it helps us continuously enhance our services.</p>
                                        <ul class="d-flex">
                                            <li class="mx-2 list-unstyled"><a href="{{ setting()->wa_link }}"
                                                    target="_blank" class="text-decoration-none text-dark navbar-link"><img
                                                        src="{{ asset('assets/frontend') }}/img/whatsapp.png" alt=""
                                                        width="22"></a></li>
                                            <li class="mx-2 list-unstyled"><a href="{{ setting()->tel_link }}"
                                                    target="_blank" class="text-decoration-none text-dark navbar-link"><img
                                                        src="{{ asset('assets/frontend') }}/img/telegram.png"
                                                        alt="" width="22"></a></li>
                                            <li class="mx-2 list-unstyled"><a href="mailto:{{ setting()->email }}"
                                                    target="_blank" class="text-decoration-none text-dark navbar-link"><img
                                                        src="{{ asset('assets/frontend') }}/img/email.png" alt=""
                                                        width="22"></a></li>
                                            <li class="mx-2 list-unstyled"><a href="{{ setting()->sk_link }}"
                                                    target="_blank" class="text-decoration-none text-dark navbar-link"><img
                                                        src="{{ asset('assets/frontend') }}/img/skype.png" alt=""
                                                        width="22"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3 px-3 px-lg-5">
                                    <form action="#" method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="name"> Name *</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Enter Name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email"> Email *</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="subject"> Subject *</label>
                                            <input type="text" name="subject" class="form-control"
                                                placeholder="Enter subject">
                                            @error('subject')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="message"> Message *</label>
                                            <textarea rows="5" name="message" class="form-control" placeholder="Enter message"></textarea>
                                            @error('message')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <button type="submit"
                                            class="btn btn-block btn-sm w-100 btn-secondary">SEND</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $('.my-class').slick({
            dots: false,
            autoplay: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            centerMode: true,
            variableWidth: true
        });
    </script>
@endsection

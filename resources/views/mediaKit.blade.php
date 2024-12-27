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
                <div class="row mb-3">
                    <div class="col-lg-8 mb-3 mb-lg-0">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <h6 class="section-title mb-0">Most Resent Published</h6>
                            {{-- <a href="#" class="text-muted text-decoration-none">View more &raquo;</a> --}}
                        </div>
                        <div class="section-bg mb-3">
                            <div class="row">
                                @foreach (resentBrokerBonus() as $item)
                                    <div class="col-md-6">
                                        @include('layouts.partials.post-style-one')
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <a href="{{ advertisement(6)->link }}" class="text-decoration-none">
                            <img src="{{ asset('uploads/ad/6.png') }}" class="img-fluid w-100" alt="">
                            <small class="d-block text-dark fw-bold">Price-${{ advertisement(6)->price }}</small>
                        </a>
                    </div>
                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <h6 class="section-title mb-0">Featured Forex Brokers</h6>
                            <a href="#" class="text-muted text-decoration-none">View more &raquo;</a>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @foreach ($brokers as $item)
                                    @include('layouts.partials.broker')
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="carousel-box my-class">
                            @foreach ($awards as $item)
                                <a href="{{ route('frontend.award.details', $item->slug) }}" target="_blank" class="text-dark text-decoration-none mx-1" style="width: 300px">
                                    <div class="card rounded border">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <img src="{{ asset($item->logo) }}" alt="" style="width:100px">
                                                <div class="text-end w-50">
                                                    <span class="badge bg-warning">Award {{ $item->award_year }}</span>
                                                    <p class="textx-dark">{{ $item->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <h6 class="section-title mb-0">{{ bonusCategory(2)->name }}</h6>
                            <a href="{{ route('frontend.bonusCategory', bonusCategory(2)->slug) }}" class="text-muted text-decoration-none">View more &raquo;</a>
                        </div>
                        <div class="section-bg">
                            <div class="row">
                                @foreach (bonuses(2, 9) as $item)
                                    <div class="col-md-12">
                                        @include('layouts.partials.post-style-one')
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="text-center">
                            <p class="mb-1">Advertising</p>
                        </div>
                        <a href="{{ advertisement(7)->link }}">
                            <img src="{{ asset('uploads/ad/7.png') }}" alt="" class="img-fluid common-rounded">
                        </a>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <h6 class="section-title mb-0">{{ bonusCategory(1)->name }}</h6>
                            <a href="{{ route('frontend.bonusCategory', bonusCategory(1)->slug) }}" class="text-muted text-decoration-none">View more &raquo;</a>
                        </div>

                        <div class="section-bg">
                            <div class="row">
                                @foreach (bonuses(1, 9) as $item)
                                    <div class="col-md-12">
                                        @include('layouts.partials.post-style-one')
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="d-block d-lg-none section-title border-bottom border-2">{{ section(3)->name }}</h6>
                        <h4 class="d-none d-lg-block section-title border-bottom border-3">{{ section(3)->name }}</h4>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            @foreach (posts(3, 10) as $item)
                                @include('layouts.partials.post-style-two')
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-center">
                            <p class="mb-1">Advertising</p>
                        </div>
                        <a href="{{ advertisement(8)->link }}" class="text-decoration-none">
                            <img src="{{ asset('uploads/ad/8.png') }}" alt="" class="img-fluid common-rounded">
                            <small class="d-block text-dark fw-bold">Price-${{ advertisement(8)->price }}</small>
                        </a>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <h6 class="section-title mb-0">Sponserd By Broker</h6>
                            <a href="#" class="text-muted text-decoration-none">Advertising</a>
                        </div>
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ asset($sponserd->logo) }}" alt="" class="img-fluid">
                                </div>

                                <div class="d-flex justify-content-between align-items-center border-bottom py-1">
                                    <p class="my-1 fw-bold">Leverage</p>
                                    <p class="my-1">{{ $sponserd->leverage }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center border-bottom py-1">
                                    <p class="my-1 fw-bold">Min Diposits</p>
                                    <p class="my-1">{{ $sponserd->min_deposit }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center border-bottom py-1">
                                    <p class="my-1 fw-bold">Trading Desk</p>
                                    <p class="my-1">{{ $sponserd->trading_desk }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center border-bottom py-1">
                                    <p class="my-1 fw-bold">Platform</p>
                                    <p class="my-1">{{ $sponserd->platform }}</p>
                                </div>

                                <div class="d-flex justify-content-center align-items-center border-bottom py-1 text-center">
                                    <a target="_blank" href="{{ $sponserd->review_link }}" class="text-decoration-none">Full Review</a>
                                </div>
                            </div>
                            <div class="card-footer m-0 p-0">
                                <a target="_blank" href="{{ $sponserd->website_link }}" class="btn btn-block w-100 rounded-0 text-white" style="background: #0151A6">Visit Broker</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <h6 class="section-title mb-0">{{ bonusCategory(3)->name }}</h6>
                            <a href="{{ route('frontend.bonusCategory', bonusCategory(3)->slug) }}" class="text-muted text-decoration-none">View more &raquo;</a>
                        </div>
                        <div class="section-bg">
                            <div class="row">
                                @foreach (bonuses(3, 9) as $item)
                                    <div class="col-md-12">
                                        @include('layouts.partials.post-style-one')
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <h6 class="section-title mb-0">{{ bonusCategory(4)->name }}</h6>
                            <a href="{{ route('frontend.bonusCategory', bonusCategory(4)->slug) }}" class="text-muted text-decoration-none">View more &raquo;</a>
                        </div>
                        <div class="section-bg">
                            <div class="row">
                                @foreach (bonuses(4, 9) as $item)
                                    <div class="col-md-12">
                                        @include('layouts.partials.post-style-one')
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="text-center">
                            <p class="mb-1">Advertising</p>
                        </div>
                        <a href="{{ advertisement(9)->link }}">
                            <img src="{{ asset('uploads/ad/9.png') }}" alt="" class="img-fluid common-rounded">
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <h6 class="section-title mb-0">Forex Broker Review</h6>
                            {{-- <a href="#" class="text-muted text-decoration-none">Advertising</a> --}}
                        </div>
                        <div class="row g-1 mt-1">
                            @foreach ($brokerReviews as $item)
                                <div class="col-lg-4 mb-1">
                                    <a href="{{ route('frontend.broker.details', $item->slug) }}" class="text-decoration-none text-dark">
                                        <div class="card">
                                            <div class="card-body text-start py-1">
                                                <img src="{{ asset($item->logo) }}" alt="" class="img-fluid" width="80">
                                                <p class="mb-0" style="font-size: 18px;">{{ $item->title }}</p>
                                                <small class="d-block">{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
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
















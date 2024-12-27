<nav class="border">

    <div class="wrapper">
        <div class="logo">
            <a href="{{ route('frontend.index') }}">
                <img src="{{ asset(setting()->site_logo) }}" alt="" class="img-fluid" width="200">
            </a>
        </div>
        <div class="text-start text-lg-end">
            <ul class="mb-0 nav-links mt-1">
                <li><a href="{{ route('frontend.award.index') }}" class="text-decoration-none text-dark"><span class="badge bg-warning text-dark" style="border-radius: 20px; font-weight: 300;">AWARD {{ Carbon\Carbon::now()->format('Y') }}</span></a></li>
                <li><a href="{{ route('frontend.advertisement') }}" class="text-decoration-none text-dark navbar-link">Advertising</a></li>
                <li><a href="{{ route('frontend.contact') }}" class="text-decoration-none text-dark navbar-link">Contact Us</a></li>
                <li><a href="{{ setting()->wa_link }}" target="_blank" class="text-decoration-none text-dark navbar-link"><img src="{{ asset('assets/frontend') }}/img/whatsapp.png" alt="" width="22"></a></li>
                <li><a href="{{ setting()->tel_link }}" target="_blank" class="text-decoration-none text-dark navbar-link"><img src="{{ asset('assets/frontend') }}/img/telegram.png" alt="" width="22"></a></li>
                <li><a href="mailto:{{ setting()->email }}" target="_blank" class="text-decoration-none text-dark navbar-link"><img src="{{ asset('assets/frontend') }}/img/email.png" alt="" width="22"></a></li>
                <li><a href="{{ setting()->sk_link }}" target="_blank" class="text-decoration-none text-dark navbar-link"><img src="{{ asset('assets/frontend') }}/img/skype.png" alt="" width="22"></a></li>
                <li>
                    <form action="#" method="get" class="d-flex justify-content-start align-items-center">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="Search...">
                        </div>
                        <button type="submit" class="border-0 header-form-btn ms-2"><i class="fa fa-search"></i></button>
                    </form>
                </li>
            </ul>


            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links mb-0">
                <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                <li class="text-nowrap">
                    <a href="#" class="desktop-item">Forex Bonus</a>
                    <input type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="m-0 p-0">Forex Bonus</span>
                            <span class="m-0 p-0" style="font-size: 13px"><i class="fa-solid fa-angle-down"></i></span>
                        </div>
                    </label>
                    <ul class="drop-menu text-start">
                        @foreach (getCategoriesForMenu() as $item)
                            <li><a href="{{ route('frontend.bonusCategory', $item->slug) }}">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li class="text-nowrap">
                    <a href="#" class="desktop-item">Brokers Review</a>
                    <input type="checkbox" id="showMega">
                    <label for="showMega" class="mobile-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="m-0 p-0">Brokers Review</span>
                            <span class="m-0 p-0" style="font-size: 13px"><i class="fa-solid fa-angle-down"></i></span>
                        </div>
                    </label>
                    <div class="mega-box">
                        <div class="content">
                            <div class="row">
                                <header>{{ getBrokerCategory(1)->name }}</header>
                                <ul class="mega-links">
                                    @foreach (getBrokerReviewByCategory(1) as $item)
                                        <li><a href="{{ route('frontend.broker.details', $item->slug) }}">{{ $item->brokers_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="row">
                                <header>{{ getBrokerCategory(2)->name }}</header>
                                <ul class="mega-links">
                                    @foreach (getBrokerReviewByCategory(2) as $item)
                                        <li><a href="{{ route('frontend.broker.details', $item->slug) }}">{{ $item->brokers_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="row">
                                <header>{{ getBrokerCategory(3)->name }}</header>
                                <ul class="mega-links">
                                    @foreach (getBrokerReviewByCategory(3) as $item)
                                        <li><a href="{{ route('frontend.broker.details', $item->slug) }}">{{ $item->brokers_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="row">
                                <header>{{ getBrokerCategory(4)->name }}</header>
                                <ul class="mega-links">
                                    @foreach (getBrokerReviewByCategory(4) as $item)
                                        <li><a href="{{ route('frontend.broker.details', $item->slug) }}">{{ $item->brokers_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="text-nowrap">
                    <a href="#" class="desktop-item">Best Forex Broker</a>
                    <input type="checkbox" id="showMega">
                    <label for="showMega" class="mobile-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="m-0 p-0">Best Forex Broker</span>
                            <span class="m-0 p-0" style="font-size: 13px"><i class="fa-solid fa-angle-down"></i></span>
                        </div>
                    </label>
                    <div class="mega-box">
                        <div class="content" style="border-radius: 0px;">
                            <div class="row">
                                <header>{{ getBestForexBrokerCategory(1)->name }}</header>
                                <ul class="mega-links">
                                    @foreach (getBestFrexBrokerSubCategory(1) as $item)
                                        <li><a href="#">{{ $item->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="row">
                                <header>{{ getBestForexBrokerCategory(2)->name }}</header>
                                <ul class="mega-links">
                                    @foreach (getBestFrexBrokerSubCategory(2) as $item)
                                        <li><a href="#">{{ $item->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="row">
                                <header>{{ getBestForexBrokerCategory(3)->name }}</header>
                                <ul class="mega-links">
                                    @foreach (getBestFrexBrokerSubCategory(3) as $item)
                                        <li><a href="#">{{ $item->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        {{--  --}}
                        <div class="content" style="border-radius: 0px;">
                            <div class="row">
                                <header>{{ getBestForexBrokerCategory(4)->name }}</header>
                                <ul class="mega-links">
                                    @foreach (getBestFrexBrokerSubCategory(4) as $item)
                                        <li><a href="#">{{ $item->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="row">
                                <header>{{ getBestForexBrokerCategory(5)->name }}</header>
                                <ul class="mega-links">
                                    @foreach (getBestFrexBrokerSubCategory(5) as $item)
                                        <li><a href="#">{{ $item->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="row">
                                <header>{{ getBrokerCategory(4)->name }}</header>
                                <ul class="mega-links">
                                    @foreach (getBestFrexBrokerSubCategory(6) as $item)
                                        <li><a href="#">{{ $item->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        {{--  --}}
                        <div class="content" style="border-radius: 0px 0px 10px 10px;">
                            <div class="row">&nbsp;</div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <header>{{ getBestForexBrokerCategory(7)->name }}</header>
                                <ul class="mega-links">
                                    @foreach (getBestFrexBrokerSubCategory(7) as $item)
                                        <li><a href="#">{{ $item->brokers_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>






                    </div>

                </li>








                <li class="text-nowrap"><a href="{{ route('frontend.compare') }}" class="">Compare</a></li>

                <li class="text-nowrap">
                    <a href="#" class="desktop-item">Crypto</a>
                    <input type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="m-0 p-0">Crypto</span>
                            <span class="m-0 p-0" style="font-size: 13px"><i class="fa-solid fa-angle-down"></i></span>
                        </div>
                    </label>
                    <ul class="drop-menu text-start">
                        @foreach (getCryptos() as $item)
                            <li><a href="{{ route('frontend.crypto', $item->slug) }}">{{ $item->coin_name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li class="text-nowrap">
                    <a href="#" class="desktop-item">Forex Award</a>
                    <input type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="m-0 p-0">Forex Award</span>
                            <span class="m-0 p-0" style="font-size: 13px"><i class="fa-solid fa-angle-down"></i></span>
                        </div>
                    </label>
                    <ul class="drop-menu text-start">
                        <li><a href="{{ route('frontend.award.index') }}">Forex Broker Award {{ Carbon\Carbon::now()->format('Y') }}</a></li>
                        <li><a href="{{ route('frontend.award.gbaward') }}">Global Bank Award {{ Carbon\Carbon::now()->format('Y') }}</a></li>
                        {{-- <li><a href="{{ route('frontend.award.goaward') }}">Global Online Bank {{ Carbon\Carbon::now()->format('Y') }}</a></li> --}}
                        <li><a href="{{ route('frontend.award.ptfaward') }}">Prop Trading Firm Award {{ Carbon\Carbon::now()->format('Y') }}</a></li>
                    </ul>
                </li>



                <li class="text-nowrap"><a href="#" class="">Others</a></li>
            </ul>
            <label for="menu-btn" class="btn menu-btn text-dark"><i class="fas fa-bars"></i></label>
        </div>
    </div>
</nav>
<br><br>

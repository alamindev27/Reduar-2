<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="risk-worning p-3 common-rounded text-white mt-3">
                <p class="mb-0"><b>Risk Worning:</b> Your Capital is at risk. Statistically, only 11-25% of
                    traders gain profit when trading Forex and CFDs. The remaining 74-89% of customers lose their
                    invites tment. Invest in capital that is willing to expose such risks.</p>
            </div>
        </div>
    </div>
</div>

<hr>
<footer class="mt-3">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    {{-- <a href="{{ route('frontend.index') }}">
                        <img src="{{ asset(setting()->site_logo) }}" alt="" class="img-fluid" width="180">
                    </a> --}}
                    <p class="mt-3">{{ setting()->footer_about }}</p>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <nav class="navbar navbar-expand-lg">
                            <div class=" navbar-collapse">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{ route('frontend.privacyPolicy') }}">Privacy Policy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{ route('frontend.termsOfService') }}">Terms & Condition</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{ route('frontend.copywrightPolicy') }}">Copywright Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="row pb-3">
                        <div class="col-12 text-center">
                            <p class="mb-0">&copy; Copyright <strong><span>{{ setting()->site_name }}</span></strong>. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>




@include('layouts.partials.scripts')
</body>

</html>

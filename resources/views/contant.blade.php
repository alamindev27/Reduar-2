@extends('layouts.app')
@section('styles')
    <title>Contant | {{ setting()->site_title }}</title>
@endsection
@section('content')
    <div id="main">
        <div class="container-fluid">
            <div class="container">
                {{-- <div class="row my-3">
                    <div class="col-12">
                        <h6 class="d-block d-lg-none section-title border-bottom border-2">Contant</h6>
                        <h4 class="d-none d-lg-block section-title border-bottom border-3">Contant</h4>
                    </div>
                </div> --}}

                <div class="row  my-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 mb-3 p-3">
                                        <div style="position: relative; top:50%; left:0%;width:100%;transform:translateY(-50%);">
                                            <small class="fw-bold">Get In Touch</small>
                                            <h3 class="fw-bold mt-3">We Would Be Happy To Meet You And Learn All About Your Business
                                            </h3>
                                            <p class="mt-4">{{ setting()->footer_about }}</p>
                                            <ul class="d-flex">
                                                <li class="mx-2 list-unstyled"><a href="{{ setting()->wa_link }}" target="_blank"
                                                        class="text-decoration-none text-dark navbar-link"><img
                                                            src="{{ asset('assets/frontend') }}/img/whatsapp.png" alt=""
                                                            width="22"></a></li>
                                                <li class="mx-2 list-unstyled"><a href="{{ setting()->tel_link }}" target="_blank"
                                                        class="text-decoration-none text-dark navbar-link"><img
                                                            src="{{ asset('assets/frontend') }}/img/telegram.png" alt=""
                                                            width="22"></a></li>
                                                <li class="mx-2 list-unstyled"><a href="mailto:{{ setting()->email }}"
                                                        target="_blank" class="text-decoration-none text-dark navbar-link"><img
                                                            src="{{ asset('assets/frontend') }}/img/email.png" alt=""
                                                            width="22"></a></li>
                                                <li class="mx-2 list-unstyled"><a href="{{ setting()->sk_link }}" target="_blank"
                                                        class="text-decoration-none text-dark navbar-link"><img
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
                                                <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="email"> Email *</label>
                                                <input type="email" name="email" class="form-control" placeholder="Enter email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="subject"> Subject *</label>
                                                <input type="text" name="subject" class="form-control" placeholder="Enter subject">
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

                                            <button type="submit" class="btn btn-block btn-sm w-100 btn-secondary">SEND</button>
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
@endsection
@section('scripts')
@endsection

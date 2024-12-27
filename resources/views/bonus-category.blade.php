
@extends('layouts.app')
@section('styles')
<title>{{ $category->name }} | {{ setting()->site_title }}</title>

@endsection
@section('content')
    <div id="main">
        <div class="container-fluid">
            <div class="container">
                <div class="row mb-3">

                    <div class="col-lg-8 mb-3">
                        <div class="card mb-3">
                            <div class="card-body py-2">
                                <h5 class="card-title my-0 py-0 fw-bold">{{ $category->name }}</h5>
                            </div>
                        </div>
                        @forelse ($datas as $data)
                            <div class="card mb-3">
                                <div class="card-body p-2">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <a href="{{ route('frontend.bonus.details', $data->slug) }}">
                                                <img src="{{ asset($data->image) }}" alt="" width="200">
                                            </a>
                                        </div>
                                        <div class="col-lg-8">
                                            <h4 class="mb-1">
                                                <a href="{{ route('frontend.bonus.details', $data->slug) }}" class="text-decoration-none text-dark">{{ $data->title }}</a>
                                            </h4>
                                            <p class="mb-1"><b>Promo:</b> {{ $data->bonus }}</p>
                                            <small>{{ shorter($data->short_description, 100) }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="text-center">
                                    <p class="text-danger">No Data Available</p>
                                </div>
                            @endforelse


                        {{ $datas->withQueryString()->links() }}

                    </div>

                    <div class="col-lg-4 mb-3">
                        <h6 class="d-block d-lg-none section-title">Resent Published</h6>
                        <h4 class="d-none d-lg-block section-title">Resent Published</h4>

                        <div class="">
                            <div class="row">
                                @foreach (resentBrokerBonus() as $item)
                                    <div class="col-12">
                                        @include('layouts.partials.post-style-one')
                                    </div>
                                @endforeach
                            </div>
                        </div>



                        <p class="mb-0 text-center mt-3">Advertising</p>
                        <a href="#">
                            <img src="https://placehold.co/1080x1080/png" class="img-fluid w-100" alt="">
                        </a>



                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h6 class="d-block d-lg-none section-title border-bottom border-2">{{ section(2)->name }}</h6>
                            <h4 class="d-none d-lg-block section-title border-bottom border-3">{{ section(2)->name }}</h4>
                        </div>
                        @foreach ($brokers as $item)
                            @include('layouts.partials.broker')
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
















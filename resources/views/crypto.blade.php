@extends('layouts.app')
@section('styles')
<title>{{ $data->coin_name }}</title>
@endsection
@section('content')

    <div id="main">
        <div class="container-fluid">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-start align-items-center">
                                    <img src="{{ asset($data->icon) }}" alt="" class="img-fluid rounded-circle" width="30">
                                    <h4 class="ms-2 mb-0 fw-bold">{{ $data->coin_name }}</h4>
                                </div>
                                @php
                                    $baseUrl = route('frontend.index');
                                    $arr = explode('//', $baseUrl);
                                @endphp
                                @if ($data->updated_at)
                                    <small>Updated: {{ Carbon\Carbon::parse($data->updated_at)->format('d M, Y') }} - {{ $arr[1] }}</small>
                                @else
                                    <small>Published at: {{ Carbon\Carbon::parse($data->created_at)->format('d M, Y') }} - {{ $arr[1] }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body pb-0 ">
                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <div class="d-flex justify-content-between align-items-center border-bottom">
                                    <p class="mb-1 fw-bold">Coin Name :</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <img src="{{ asset($data->icon) }}" alt="" class="img-fluid rounded-circle" width="20">
                                        <p class="mb-1 ms-1">{{ $data->coin_name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="d-flex justify-content-between align-items-center border-bottom">
                                    <p class="mb-1 fw-bold">Status :</p>
                                    <p class="mb-1">{{ $data->status == 'yes' ? '✅' : '❌' }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="d-flex justify-content-between align-items-center border-bottom">
                                    <p class="mb-1 fw-bold">Origin  :</p>
                                    <p class="mb-1">{{ $data->origin  }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="d-flex justify-content-between align-items-center border-bottom">
                                    <p class="mb-1 fw-bold">Symbol :</p>
                                    <p class="mb-1">{{ $data->symbol   }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="d-flex justify-content-between align-items-center border-bottom">
                                    <p class="mb-1 fw-bold">Year Released :</p>
                                    <p class="mb-1">{{ $data->released_year   }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="d-flex justify-content-between align-items-center border-bottom">
                                    <p class="mb-1 fw-bold">Max. Supply :</p>
                                    <p class="mb-1">{{ $data->max_supply  }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            {!! $data->description !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection
















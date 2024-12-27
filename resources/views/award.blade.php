
@extends('layouts.app')
@section('styles')
<title>Awards</title>

@endsection
@section('content')
    <div id="main">
        <div class="container-fluid">
            <div class="container">
                @if ($award)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <img src="{{ asset($award->logo) }}" alt="{{ $award->title }}" class="img-fluid">
                                </div>
                                <div class="col-lg-8">
                                    <h1>Forex Brokers Award {{ Carbon\Carbon::now()->format('Y') }}</h1>
                                    <p>The Forex Award by GlobalForexInfo.com is a prestigious recognition celebrated globally for its transparent evaluation and research methodologies. Renowned for highlighting excellence, the award is a mark of trust and credibility in the Forex industry.</p>
                                    <a href="#" class="btn btn-danger">NOMINATE NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="d-block d-lg-flex justify-content-between align-itmes-center">
                            <div class="text-center text-lg-start">
                                <h2 class="fw-bold">Forex Award in {{ Carbon\Carbon::now()->format('Y') }}</h2>
                                <p class="fw-bold">Delve into the varius categories and winners, offering in-depth insights into top performers.</p>
                            </div>

                            <div class="d-flex justify-content-between justify-content-lg-start align-itmes-center mb-3">
                                <h3 class="text-nowarp">Award Result</h3>
                                <div class="ms-3">
                                    <select onchange="searchAward(this)" class="form-control border-1 border-dark rounded-0 fw-bold">
                                        @php
                                            $now = Carbon\Carbon::now()->format('Y');
                                            $i = $year->award_year;
                                        @endphp
                                        <option value="">Filter</option>
                                        @for ($i; $i <=  $now ; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                <div class="row mb-3 justify-content-center" id="award-content">
                    @foreach ($datas as $data)
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5>"{{ $data->name }}"</h5>
                                    <span>Award {{ $data->award_year }}</span>
                                    <a href="{{ route('frontend.award.details', $data->slug) }}">
                                        <img src="{{ asset($data->logo) }}" alt="{{ $data->name }}" class="img-fluid">
                                    </a>
                                    <div class="" style="background: #F1F2F2;">
                                        <p class="text-center border-bottom border-dark fw-bold">Download Badge As</p>
                                        <a href="{{ $data->png }}" class="text-decoration-none text-dark">PNG</a> |
                                        <a href="{{ $data->psd }}" class="text-decoration-none text-dark">PSD</a>
                                        {{-- <a target="_blank" href="{{ asset($data->logo) }}" class="btn btn-danger text-nowrap btn-sm"><i class="fa fa-eye"></i> View</a>
                                        <a target="_blank" href="{{ $data->download_link }}" download class="btn btn-dark text-nowrap btn-sm"> <i class="fa fa-download"></i> Download</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">About Forex Award</h4>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-lg-9">
                                        <p>The Forex Award by globalForeXinfo.com is a premier recognition in the Forex industry, celebrated for its transparent research methods and strong public relations. Each year, top Forex brokers are honored across multiple categories, setting a benchmark of excellence and credibility.</p>
                                    </div>
                                    <div class="col-lg-3 text-center">
                                        <img src="{{ asset('uploads/award-about1.png') }}" alt="" class="img-fluid">
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
<script>
    function searchAward(el){
        var year = $(el).val();
        $.ajax({
            type: 'GET',
            url: '{{ route('search.award') }}',
            data: {
                year: year
            },
            success: function(data) {
                $('#award-content').html(data);
            },
        });
    }
</script>
@endsection
















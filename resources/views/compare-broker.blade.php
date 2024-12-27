@extends('layouts.app')
@section('styles')
    <title>Contant | {{ setting()->site_title }}</title>
@endsection
@section('content')
    <div id="main">
        <div class="container-fluid">
            <div class="container">
                <div class="row  my-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="{{ route('frontend.compare') }}" method="get" id="brokerForm">
                                    <div class="row">
                                        <div class="col-lg-3"></div>

                                        <div class="col-lg-3 mb-3">
                                            <div class="form-group">
                                                <label for="oneID">Select Broker</label>
                                                <select name="oneID" id="oneID" class="form-control">

                                                    @foreach ($reviews as $review)
                                                        <option {{ $_GET['oneID'] == $review->id ? 'selected' : '' }} value="{{ $review->id }}">{{ $review->brokers_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-3">
                                            <div class="form-group">
                                                <label for="twoID">Select Broker</label>
                                                <select name="twoID" id="twoID" class="form-control">

                                                    @foreach ($reviews as $review)
                                                        <option {{ $_GET['twoID'] == $review->id ? 'selected' : '' }} value="{{ $review->id }}">{{ $review->brokers_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-3">
                                            <div class="form-group">
                                                <label for="threeId">Select Broker</label>
                                                <select name="threeId" id="threeId" class="form-control">

                                                    @foreach ($reviews as $review)
                                                        <option {{ $_GET['threeId'] == $review->id ? 'selected' : '' }} value="{{ $review->id }}">{{ $review->brokers_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-3 mb-3">
                                            <label for=""> &nbsp; </label>
                                            <button class="btn btn-block w-100 btn-primary" type="submit">Compare</button>
                                        </div> --}}
                                    </div>
                                </form>
                            </div>
                            <div class="card-body" id="compare-broker">

                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Trading Desk</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="trading_desk">{{ $oneBroker->trading_desk }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="trading_desk">{{ $twoBroker->trading_desk }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="trading_desk">{{ $threeBroker->trading_desk }}</span>
                                    </div>
                                </div>

                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Founded Year</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="year_founded ">{{ $oneBroker->year_founded  }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="year_founded ">{{ $twoBroker->year_founded  }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="year_founded ">{{ $threeBroker->year_founded  }}</span>
                                    </div>
                                </div>

                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Regulation</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="regulation">{{ $oneBroker->regulation }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="regulation">{{ $twoBroker->regulation }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="regulation">{{ $threeBroker->regulation }}</span>
                                    </div>
                                </div>

                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">US Clients</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="us_clients">{{ $oneBroker->us_clients }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="us_clients">{{ $twoBroker->us_clients }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="us_clients">{{ $threeBroker->us_clients }}</span>
                                    </div>
                                </div>



                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">247 Support</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="support_247">{{ $oneBroker->support_247 == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="support_247">{{ $twoBroker->support_247 == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="support_247">{{ $threeBroker->support_247 == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                </div>

                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Languages</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="languages">{{ $oneBroker->languages }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="languages">{{ $twoBroker->languages }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="languages">{{ $threeBroker->languages }}</span>
                                    </div>
                                </div>

                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Commission </span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="commission ">{{ $oneBroker->commission  }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="commission ">{{ $twoBroker->commission  }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="commission ">{{ $threeBroker->commission  }}</span>
                                    </div>
                                </div>

                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Min. Deposit  </span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="min_deposit">{{ $oneBroker->min_deposit }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="min_deposit">{{ $twoBroker->min_deposit }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="text-capitalize" id="min_deposit">{{ $threeBroker->min_deposit }}</span>
                                    </div>
                                </div>

                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Currencies</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="currencies">{{ $oneBroker->currencies }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="currencies">{{ $twoBroker->currencies }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="currencies">{{ $threeBroker->currencies }}</span>
                                    </div>
                                </div>

                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Execution</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="execution">{{ $oneBroker->execution }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="execution">{{ $twoBroker->execution }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="execution">{{ $threeBroker->execution }}</span>
                                    </div>
                                </div>


                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Leverage</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="leverage">{{ $oneBroker->leverage }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="leverage">{{ $twoBroker->leverage }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="leverage">{{ $threeBroker->leverage }}</span>
                                    </div>
                                </div>


                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Spreads</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="spreads">{{ $oneBroker->spreads }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="spreads">{{ $twoBroker->spreads }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="spreads">{{ $threeBroker->spreads }}</span>
                                    </div>
                                </div>


                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Trade Size </span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="trade_size">{{ $oneBroker->trade_size }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="trade_size">{{ $twoBroker->trade_size }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="trade_size">{{ $threeBroker->trade_size }}</span>
                                    </div>
                                </div>


                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Demo Trading </span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="demo_trading">{{ $oneBroker->demo_trading  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="demo_trading">{{ $twoBroker->demo_trading  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="demo_trading">{{ $threeBroker->demo_trading  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                </div>


                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Swap Free </span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="swap_free">{{ $oneBroker->swap_free  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="swap_free">{{ $twoBroker->swap_free  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="swap_free">{{ $threeBroker->swap_free  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                </div>


                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Copy Trading </span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="copy_trading">{{ $oneBroker->copy_trading  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="copy_trading">{{ $twoBroker->copy_trading  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="copy_trading">{{ $threeBroker->copy_trading  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                </div>


                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Crypto Trading </span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="crypto_trading">{{ $oneBroker->crypto_trading  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="crypto_trading">{{ $twoBroker->crypto_trading  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="crypto_trading">{{ $threeBroker->crypto_trading  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                </div>


                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Platform  </span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="platform">{{ $oneBroker->platform }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="platform">{{ $twoBroker->platform }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="platform">{{ $threeBroker->platform }}</span>
                                    </div>
                                </div>


                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Mobile Mrading  </span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="mobile_trading">{{ $oneBroker->mobile_trading  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="mobile_trading">{{ $twoBroker->mobile_trading   == 'yes' ? '✔️' : '❌'}}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="mobile_trading">{{ $threeBroker->mobile_trading   == 'yes' ? '✔️' : '❌'}}</span>
                                    </div>
                                </div>


                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">Web Trading</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="web_trading">{{ $oneBroker->web_trading  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="web_trading">{{ $twoBroker->web_trading  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="web_trading">{{ $threeBroker->web_trading  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                </div>


                                <div class="row py-1 border-bottom">
                                    <div class="col-lg-3">
                                        <span class="fw-bold">affiliate </span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="affiliate">{{ $oneBroker->affiliate  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="affiliate">{{ $twoBroker->affiliate  == 'yes' ? '✔️' : '❌' }}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="affiliate">{{ $threeBroker->affiliate  == 'yes' ? '✔️' : '❌' }}</span>
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


$(document).ready(function(){
   $('#oneID').change(function(){
       $('#brokerForm').submit();
    });
});
$(document).ready(function(){
   $('#twoID').change(function(){
       $('#brokerForm').submit();
    });
});
$(document).ready(function(){
   $('#threeId').change(function(){
       $('#brokerForm').submit();
    });
});

</script>
@endsection

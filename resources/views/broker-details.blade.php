@extends('layouts.app')
@section('styles')
    <title>{{ $data->title }}</title>
@endsection
@section('content')
    <div id="main">
        <div class="container-fluid">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h4 class="mb-0">{{ $data->title }}</h4>
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

                        <div class="card mb-3">
                            <div class="card-body">
                                {!! $data->short_description !!}
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                <h4 class="card-title">Brokers Highlights</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Brokers Name</th>
                                        <td>{{ $data->brokers_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Trading Desk</th>
                                        <td>{{ $data->trading_desk }}</td>
                                    </tr>
                                    <tr>
                                        <th>Year Founded</th>
                                        <td>{{ $data->year_founded }}</td>
                                    </tr>
                                    <tr>
                                        <th>Headquarters</th>
                                        <td>{{ $data->headquarters }}</td>
                                    </tr>
                                    <tr>
                                        <th>Regulation</th>
                                        <td>{{ $data->regulation }}</td>
                                    </tr>
                                    <tr>
                                        <th>US Clients</th>
                                        <td>{{ $data->us_clients }}</td>
                                    </tr>
                                    <tr>
                                        <th>247 Support</th>
                                        <td>{{ $data->support_247 == 'yes' ? '✔️' : '❌' }} </td>
                                    </tr>
                                    <tr>
                                        <th>Support Email</th>
                                        <td>{{ $data->support_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Telephone</th>
                                        <td>{{ $data->telephone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $data->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Languages</th>
                                        <td>{{ $data->languages }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                <h4 class="card-title">Accounts Details</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Commission</th>
                                        <td>{{ $data->commission }}</td>
                                    </tr>
                                    <tr>
                                        <th>Accounts</th>
                                        <td>{{ $data->accounts }}</td>
                                    </tr>
                                    <tr>
                                        <th>Min. Deposit</th>
                                        <td>{{ $data->min_deposit }}</td>
                                    </tr>
                                    <tr>
                                        <th>Currencies</th>
                                        <td>{{ $data->currencies }}</td>
                                    </tr>
                                    <tr>
                                        <th>Execution</th>
                                        <td>{{ $data->execution }}</td>
                                    </tr>
                                    <tr>
                                        <th>Leverage</th>
                                        <td>{{ $data->leverage }}</td>
                                    </tr>
                                    <tr>
                                        <th>Spreads</th>
                                        <td>{{ $data->spreads }}</td>
                                    </tr>
                                    <tr>
                                        <th>Trade Size</th>
                                        <td>{{ $data->trade_size }}</td>
                                    </tr>
                                    <tr>
                                        <th>Instruments</th>
                                        <td>{{ $data->instruments }}</td>
                                    </tr>
                                    <tr>
                                        <th>Demo Trading</th>
                                        <td>{{ $data->demo_trading == 'yes' ? '✔️' : '❌' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Swap-Free</th>
                                        <td>{{ $data->swap_free == 'yes' ? '✔️' : '❌' }}</td>
                                    </tr>
                                    <tr>
                                        <th>CopyTrading</th>
                                        <td>{{ $data->copy_trading == 'yes' ? '✔️' : '❌' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Crypto Trading</th>
                                        <td>{{ $data->crypto_trading == 'yes' ? '✔️' : '❌' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                <h4 class="card-title">Platforms</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Platform</th>
                                        <td>{{ $data->platform }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mobile Trading</th>
                                        <td>{{ $data->mobile_trading == 'yes' ? '✔️' : '❌' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Web Trading</th>
                                        <td>{{ $data->web_trading == 'yes' ? '✔️' : '❌' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Affiliate</th>
                                        <td>{{ $data->affiliate == 'yes' ? '✔️' : '❌' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                <h4 class="card-title">Funding</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tr>
                                        <th class="align-items-center align-middle">Deposit</th>
                                        <td class="align-items-center align-middle">{{ $data->deposit }}</td>
                                    </tr>
                                    <tr>
                                        <th class="align-items-center align-middle">Withdrawal</th>
                                        <td class="align-items-center align-middle">{{ $data->withdrawal }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                {!! $data->description !!}
                            </div>
                        </div>



                    </div>
                    <div class="col-lg-4">

                        <div class="card py-3 shadow-sm mb-3">
                            <div class="card-body text-center">
                                <img src="{{ asset($data->logo) }}" alt="" class="img-fluid" width="130">

                                <style>
                                    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap");



                                    .rating {
                                        display: flex;
                                        align-items: center;
                                        -moz-column-gap: 0.75rem;
                                        column-gap: 0.75rem;
                                        padding: 1rem 1.25rem;
                                        border-radius: 1rem;
                                        justify-content: center;
                                    }

                                    .rating__stars {
                                        position: relative;
                                        display: inline-block;
                                        width: -webkit-max-content;
                                        width: -moz-max-content;
                                        width: max-content;
                                    }

                                    .rating__stars:before {
                                        content: url("data:image/svg+xml,%3Csvg width='174' height='30' viewBox='0 0 116 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9.14319 1.42372C9.53185 0.777902 10.4681 0.777901 10.8568 1.42372L13.0731 5.10651C13.2128 5.33853 13.4405 5.504 13.7043 5.56509L17.8918 6.53491C18.6261 6.70498 18.9154 7.59545 18.4213 8.16466L15.6036 11.4106C15.4261 11.6151 15.3391 11.8828 15.3625 12.1526L15.7342 16.4347C15.7994 17.1857 15.0419 17.736 14.3478 17.442L10.3901 15.7653C10.1408 15.6596 9.85924 15.6596 9.60991 15.7653L5.65216 17.442C4.95813 17.736 4.20065 17.1857 4.26582 16.4347L4.63745 12.1526C4.66087 11.8828 4.57387 11.6151 4.39637 11.4106L1.57871 8.16466C1.0846 7.59545 1.37393 6.70498 2.10824 6.53491L6.29567 5.56509C6.55948 5.504 6.78723 5.33853 6.92685 5.10652L9.14319 1.42372Z' fill='%23E3E0E0'/%3E%3Cpath d='M33.1432 1.42372C33.5319 0.777902 34.4681 0.777901 34.8568 1.42372L37.0731 5.10651C37.2128 5.33853 37.4405 5.504 37.7043 5.56509L41.8918 6.53491C42.6261 6.70498 42.9154 7.59545 42.4213 8.16466L39.6036 11.4106C39.4261 11.6151 39.3391 11.8828 39.3625 12.1526L39.7342 16.4347C39.7994 17.1857 39.0419 17.736 38.3478 17.442L34.3901 15.7653C34.1408 15.6596 33.8592 15.6596 33.6099 15.7653L29.6522 17.442C28.9581 17.736 28.2006 17.1857 28.2658 16.4347L28.6375 12.1526C28.6609 11.8828 28.5739 11.6151 28.3964 11.4106L25.5787 8.16466C25.0846 7.59545 25.3739 6.70498 26.1082 6.53491L30.2957 5.56509C30.5595 5.504 30.7872 5.33853 30.9269 5.10652L33.1432 1.42372Z' fill='%23E3E0E0'/%3E%3Cpath d='M57.1432 1.42372C57.5319 0.777902 58.4681 0.777901 58.8568 1.42372L61.0731 5.10651C61.2128 5.33853 61.4405 5.504 61.7043 5.56509L65.8918 6.53491C66.6261 6.70498 66.9154 7.59545 66.4213 8.16466L63.6036 11.4106C63.4261 11.6151 63.3391 11.8828 63.3625 12.1526L63.7342 16.4347C63.7994 17.1857 63.0419 17.736 62.3478 17.442L58.3901 15.7653C58.1408 15.6596 57.8592 15.6596 57.6099 15.7653L53.6522 17.442C52.9581 17.736 52.2006 17.1857 52.2658 16.4347L52.6375 12.1526C52.6609 11.8828 52.5739 11.6151 52.3964 11.4106L49.5787 8.16466C49.0846 7.59545 49.3739 6.70498 50.1082 6.53491L54.2957 5.56509C54.5595 5.504 54.7872 5.33853 54.9269 5.10652L57.1432 1.42372Z' fill='%23E3E0E0'/%3E%3Cpath d='M81.1432 1.42372C81.5319 0.777902 82.4681 0.777901 82.8568 1.42372L85.0731 5.10651C85.2128 5.33853 85.4405 5.504 85.7043 5.56509L89.8918 6.53491C90.6261 6.70498 90.9154 7.59545 90.4213 8.16466L87.6036 11.4106C87.4261 11.6151 87.3391 11.8828 87.3625 12.1526L87.7342 16.4347C87.7994 17.1857 87.0419 17.736 86.3478 17.442L82.3901 15.7653C82.1408 15.6596 81.8592 15.6596 81.6099 15.7653L77.6522 17.442C76.9581 17.736 76.2006 17.1857 76.2658 16.4347L76.6375 12.1526C76.6609 11.8828 76.5739 11.6151 76.3964 11.4106L73.5787 8.16466C73.0846 7.59545 73.3739 6.70498 74.1082 6.53491L78.2957 5.56509C78.5595 5.504 78.7872 5.33853 78.9269 5.10652L81.1432 1.42372Z' fill='%23E3E0E0'/%3E%3Cpath d='M105.143 1.42372C105.532 0.777902 106.468 0.777901 106.857 1.42372L109.073 5.10651C109.213 5.33853 109.441 5.504 109.704 5.56509L113.892 6.53491C114.626 6.70498 114.915 7.59545 114.421 8.16466L111.604 11.4106C111.426 11.6151 111.339 11.8828 111.363 12.1526L111.734 16.4347C111.799 17.1857 111.042 17.736 110.348 17.442L106.39 15.7653C106.141 15.6596 105.859 15.6596 105.61 15.7653L101.652 17.442C100.958 17.736 100.201 17.1857 100.266 16.4347L100.637 12.1526C100.661 11.8828 100.574 11.6151 100.396 11.4106L97.5787 8.16466C97.0846 7.59545 97.3739 6.70498 98.1082 6.53491L102.296 5.56509C102.559 5.504 102.787 5.33853 102.927 5.10652L105.143 1.42372Z' fill='%23E3E1E1'/%3E%3C/svg%3E%0A");
                                    }

                                    .rating__stars:after {
                                        content: url("data:image/svg+xml,%3Csvg width='174' height='30' viewBox='0 0 116 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9.14319 1.42372C9.53185 0.777902 10.4681 0.777901 10.8568 1.42372L13.0731 5.10651C13.2128 5.33853 13.4405 5.504 13.7043 5.56509L17.8918 6.53491C18.6261 6.70498 18.9154 7.59545 18.4213 8.16466L15.6036 11.4106C15.4261 11.6151 15.3391 11.8828 15.3625 12.1526L15.7342 16.4347C15.7994 17.1857 15.0419 17.736 14.3478 17.442L10.3901 15.7653C10.1408 15.6596 9.85924 15.6596 9.60991 15.7653L5.65216 17.442C4.95813 17.736 4.20065 17.1857 4.26582 16.4347L4.63745 12.1526C4.66087 11.8828 4.57387 11.6151 4.39637 11.4106L1.57871 8.16466C1.0846 7.59545 1.37393 6.70498 2.10824 6.53491L6.29567 5.56509C6.55948 5.504 6.78723 5.33853 6.92685 5.10652L9.14319 1.42372Z' fill='%23F7C305'/%3E%3Cpath d='M33.1432 1.42372C33.5319 0.777902 34.4681 0.777901 34.8568 1.42372L37.0731 5.10651C37.2128 5.33853 37.4405 5.504 37.7043 5.56509L41.8918 6.53491C42.6261 6.70498 42.9154 7.59545 42.4213 8.16466L39.6036 11.4106C39.4261 11.6151 39.3391 11.8828 39.3625 12.1526L39.7342 16.4347C39.7994 17.1857 39.0419 17.736 38.3478 17.442L34.3901 15.7653C34.1408 15.6596 33.8592 15.6596 33.6099 15.7653L29.6522 17.442C28.9581 17.736 28.2006 17.1857 28.2658 16.4347L28.6375 12.1526C28.6609 11.8828 28.5739 11.6151 28.3964 11.4106L25.5787 8.16466C25.0846 7.59545 25.3739 6.70498 26.1082 6.53491L30.2957 5.56509C30.5595 5.504 30.7872 5.33853 30.9269 5.10652L33.1432 1.42372Z' fill='%23F7C305'/%3E%3Cpath d='M57.1432 1.42372C57.5319 0.777902 58.4681 0.777901 58.8568 1.42372L61.0731 5.10651C61.2128 5.33853 61.4405 5.504 61.7043 5.56509L65.8918 6.53491C66.6261 6.70498 66.9154 7.59545 66.4213 8.16466L63.6036 11.4106C63.4261 11.6151 63.3391 11.8828 63.3625 12.1526L63.7342 16.4347C63.7994 17.1857 63.0419 17.736 62.3478 17.442L58.3901 15.7653C58.1408 15.6596 57.8592 15.6596 57.6099 15.7653L53.6522 17.442C52.9581 17.736 52.2006 17.1857 52.2658 16.4347L52.6375 12.1526C52.6609 11.8828 52.5739 11.6151 52.3964 11.4106L49.5787 8.16466C49.0846 7.59545 49.3739 6.70498 50.1082 6.53491L54.2957 5.56509C54.5595 5.504 54.7872 5.33853 54.9269 5.10652L57.1432 1.42372Z' fill='%23F7C305'/%3E%3Cpath d='M81.1432 1.42372C81.5319 0.777902 82.4681 0.777901 82.8568 1.42372L85.0731 5.10651C85.2128 5.33853 85.4405 5.504 85.7043 5.56509L89.8918 6.53491C90.6261 6.70498 90.9154 7.59545 90.4213 8.16466L87.6036 11.4106C87.4261 11.6151 87.3391 11.8828 87.3625 12.1526L87.7342 16.4347C87.7994 17.1857 87.0419 17.736 86.3478 17.442L82.3901 15.7653C82.1408 15.6596 81.8592 15.6596 81.6099 15.7653L77.6522 17.442C76.9581 17.736 76.2006 17.1857 76.2658 16.4347L76.6375 12.1526C76.6609 11.8828 76.5739 11.6151 76.3964 11.4106L73.5787 8.16466C73.0846 7.59545 73.3739 6.70498 74.1082 6.53491L78.2957 5.56509C78.5595 5.504 78.7872 5.33853 78.9269 5.10652L81.1432 1.42372Z' fill='%23F7C305'/%3E%3Cpath d='M105.143 1.42372C105.532 0.777902 106.468 0.777901 106.857 1.42372L109.073 5.10651C109.213 5.33853 109.441 5.504 109.704 5.56509L113.892 6.53491C114.626 6.70498 114.915 7.59545 114.421 8.16466L111.604 11.4106C111.426 11.6151 111.339 11.8828 111.363 12.1526L111.734 16.4347C111.799 17.1857 111.042 17.736 110.348 17.442L106.39 15.7653C106.141 15.6596 105.859 15.6596 105.61 15.7653L101.652 17.442C100.958 17.736 100.201 17.1857 100.266 16.4347L100.637 12.1526C100.661 11.8828 100.574 11.6151 100.396 11.4106L97.5787 8.16466C97.0846 7.59545 97.3739 6.70498 98.1082 6.53491L102.296 5.56509C102.559 5.504 102.787 5.33853 102.927 5.10652L105.143 1.42372Z' fill='%23F7C305'/%3E%3C/svg%3E%0A");
                                        position: absolute;
                                        top: 0;
                                        left: 0;
                                        width: calc(100% / 5 * var(--rating));
                                        overflow: hidden;
                                    }

                                    .rating__number {
                                        display: flex;
                                        align-items: center;
                                        -moz-column-gap: 0.75rem;
                                        column-gap: 0.75rem;
                                        font-size: 1rem;
                                        font-weight: 600;
                                    }
                                </style>

                                <div class="rating mt-3">
                                    <span class="rating__stars" style="--rating: {{ $data->review }};"></span>
                                    {{-- <div class="rating__number">
                                        <span class="rating__score">3.5</span>
                                        <span class="rating__reviews">(1346)</span>
                                    </div> --}}
                                </div>




                                <h5 class="mb-3">{{ $data->review . ' / 5 - ' . $data->total_ratings }} Ratings</h5>
                                <a class="btn btn-success text-white border-0 w-50"
                                    style="background: #282828; border-radius:20px;" target="_blank"
                                    href="{{ $data->website_link }}">{{ $data->brokers_name }}</a>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title text-center">More Brokers</h5>
                            </div>
                            <div class="card-body">
                                <table class="w-100">
                                    @foreach ($brokers as $broker)
                                        <tr class="border-bottom">
                                            <th style="width: 40%" class="py-2">
                                                <img src="{{ asset($broker->logo) }}" width="120" alt="">
                                            </th>
                                            <td class="py-2">
                                                <a href="{{ route('frontend.broker.details', $broker->slug) }}" class="text-dark text-decoration-none">{{ $broker->title }}</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
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

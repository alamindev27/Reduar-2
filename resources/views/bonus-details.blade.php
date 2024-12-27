
@extends('layouts.app')
@section('styles')
<title>{{ $data->title }} | {{ setting()->site_title }}</title>

@endsection
@section('content')
    <div id="main">
        <div class="container-fluid">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-12">
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
                    </div>
                    <div class="col-lg-8 mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                {!! $data->short_description !!}
                            </div>
                        </div>
                        <img src="{{ asset($data->image) }}" alt="{{ $data->title }}" class="img-fluid rounded mb-3 w-100">

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-"><b>Link :</b> <a class="text-decoration-none text-danger" href="{{ $data->link }}">{{ $data->link_text }}</a></div>

                                <div class="mt-3">
                                    {!! $data->step !!}
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                <h4 class="card-title">Details</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Bonus</th>
                                        <td>{{ $data->bonus }}</td>
                                    </tr>
                                    <tr>
                                        <th>Promo Url</th>
                                        <td>
                                            <a class="text-decoration-none text-danger" href="{{ $data->promo_url }}">{{ $data->promo_text }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Bonus</th>
                                        <td>{{ $data->bonus_2 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Platform</th>
                                        <td>{{ $data->platform }}</td>
                                    </tr>
                                    <tr>
                                        <th>Leverage</th>
                                        <td>{{ $data->leverage }}</td>
                                    </tr>
                                    <tr>
                                        <th>Regulation</th>
                                        <td>{{ $data->regulation }}</td>
                                    </tr>
                                    <tr>
                                        <th>KYC</th>
                                        <td>{{ $data->kyc }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contacts</th>
                                        <td>{{ $data->contacts }}</td>
                                    </tr>
                                    <tr>
                                        <th>Review</th>
                                        <td>{{ $data->review }}</td>
                                    </tr>



                                    {{-- <tr>
                                        <th>247 Support</th>
                                        <td>{{ $data->support_247 == 'yes' ? '✔️' : '❌' }} </td>
                                    </tr> --}}
                                </table>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header"><h5>General Treams & Condition</h5></div>
                            <div class="card-body">
                                <div>
                                    {!! $data->description !!}
                                </div>
                            </div>
                        </div>


                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title">Leave a Reply</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('blog.comment.store') }}" method="POST" id="comment-form">
                                    @csrf
                                    <input type="hidden" value="{{ Crypt::encrypt($data->id) }}" name="id">
                                    <div class="form-group mb-3">
                                        <label for="name">Name *</label>
                                        <input type="text" name="name" id="name" placeholder="Enter name" value="{{old('name')}}" class="form-control" autocomplete="off">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email">Email *</label>
                                        <input type="text" name="email" id="email" placeholder="Enter email" value="{{old('email')}}" class="form-control" autocomplete="off">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="comment">Comment *</label>
                                        <textarea name="comment" id="comment" rows="5" class="form-control" placeholder="Enter comment">{{ old('comment') }}</textarea>
                                        @error('comment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-sm btn-dark" type="submit">Post Comment</button>
                                </form>
                            </div>
                        </div>
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

                        @if (advertisement(12)->status == 'unavailable')
                            <p class="mb-0 text-center mt-3">Advertising</p>
                            <a href="{{ advertisement(12)->link }}" target="_blank">
                                <img src="{{ asset(advertisement(12)->image) }}" class="img-fluid w-100" alt="">
                            </a>
                        @endif


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
















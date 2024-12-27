
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
                                    $url = url('/');
                                    $arr = explode('.', $url);
                                @endphp
                                <small>Updated on : {{ Carbon\Carbon::parse($data->created_at)->format('M d, Y') }} -
                                    {{ $arr[0] == 'https://' ? $arr[1] . '.' . $arr[2] : 'example.com' }}</small>
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
                                <div>
                                    {!! $data->description !!}
                                </div>
                            </div>
                        </div>


                        <div class="card mb-3">
                            <div class="card-header"><h4 class="card-title">More Awarded Brokers</h4></div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($datas as $item)
                                        <div class="col-lg-6">
                                            <a href="{{ route('frontend.award.details', $item->slug) }}" target="_blank" class="text-dark text-decoration-none mx-1" style="width: 300px">
                                                <div class="card rounded border">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <img src="{{ asset($item->logo) }}" alt="" style="width:100px">
                                                            <div class="text-end ms-2">
                                                                <p class="textx-dark">{{ $item->title }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title">Leave a Reply</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('award.comment.store') }}" method="POST" id="comment-form">
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
                                @foreach (posts(1, 6) as $item)
                                    <div class="col-12">
                                        @include('layouts.partials.post-style-one')
                                    </div>
                                @endforeach
                            </div>
                        </div>



                        <p class="mb-0 text-center mt-3">Octa Deposit Bonus</p>
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
















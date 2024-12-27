@extends('admin.layouts.app_admin')
@section('styles')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Broker</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Broker</li>
                    <li class="breadcrumb-item active">Edit Broker</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Broker</h5>
                            <form method="POST" action="{{ route('sponserd-broker.update', $data->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="trading_desk">Trading Desk *</label>
                                    <input type="text" class="form-control" name="trading_desk" id="trading_desk"
                                        placeholder="Enter trading desk" value="{{ old('trading_desk') ?? $data->trading_desk }}">
                                    @error('trading_desk')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="min_deposit">Min Deposit *</label>
                                    <input type="text" class="form-control" name="min_deposit" id="min_deposit"
                                        placeholder="Enter min deposit" value="{{ old('min_deposit') ?? $data->min_deposit }}">
                                    @error('min_deposit')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="leverage">Leverage *</label>
                                    <input type="text" class="form-control" name="leverage" id="leverage"
                                        placeholder="Enter leverage" value="{{ old('leverage') ?? $data->leverage }}">
                                    @error('leverage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="platform">Platform *</label>
                                    <input type="text" class="form-control" name="platform" id="platform"
                                        placeholder="Enter platform" value="{{ old('platform') ?? $data->platform }}">
                                    @error('platform')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="website_link">Website Link *</label>
                                    <input type="text" class="form-control" name="website_link" id="website_link"
                                        placeholder="Enter website link"
                                        value="{{ old('website_link') ?? $data->website_link }}">
                                    @error('website_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="review_link">Review Link *</label>
                                    <input type="text" class="form-control" name="review_link" id="review_link"
                                        placeholder="Enter review link"
                                        value="{{ old('review_link') ?? $data->review_link }}">
                                    @error('review_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="logo">Logo</label>
                                    <input type="file" class="form-control" name="logo" id="logo">
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <img src="{{ asset($data->logo) }}" alt="" class="border p-1 rounded"
                                        width="80">
                                </div>





                                <div class="text-center">
                                    <button class="btn btn-success" type="submit">Save & Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('scripts')
@endsection

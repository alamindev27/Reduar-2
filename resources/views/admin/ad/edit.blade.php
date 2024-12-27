@extends('admin.layouts.app_admin')
@section('styles')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Advertisement</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Advertisement</li>
                    <li class="breadcrumb-item active">Add Advertisement</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Advertisement ({{ $data->id }})</h5>
                            <form method="POST" action="{{ route('advertisement.update', $data->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="starting_time">Starting Time *</label>
                                            <input type="date" class="form-control" name="starting_time" id="starting_time" value="{{ old('starting_time') }}">
                                            @error('starting_time')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="ending_time">Ending Time *</label>
                                            <input type="date" class="form-control" name="ending_time" id="ending_time" value="{{ old('ending_time') }}">
                                            @error('ending_time')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="price">Price *</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">$</span>
                                                </div>
                                                <input type="number" class="form-control" name="price" id="price" placeholder="Enter price" value="{{ old('price') ?? $data->price }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">/month</span>
                                                </div>
                                            </div>
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="status">Status *</label>
                                            <select name="status" id="status" class="form-control">
                                                <option {{ $data->status == 'available' ? 'selected' : '' }} value="available">Available</option>
                                                <option {{ $data->status == 'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>
                                            </select>
                                            @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="link">Link *</label>
                                    <input type="text" class="form-control" name="link" id="link"
                                        placeholder="Enter banner link" value="{{ old('link') ?? $data->link }}">
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-lg-9">
                                        <label class="control-label pt-2" for="image">Banner Image *</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                        <small class="d-block text-danger">size: {{ $data->size }}</small>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <br>
                                        <a href="{{ asset($data->image) }}">View Banner</a>
                                        {{-- <img src="{{ asset($data->image) }}" alt="" class="img-fluid"> --}}
                                    </div>
                                </div>



<br>
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

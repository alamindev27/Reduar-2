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
                            <form method="POST" action="{{ route('broker.update', $data->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="heading_1">Heading 1 *</label>
                                    <input type="text" class="form-control" name="heading_1" id="heading_1"
                                        placeholder="Enter heading 1" value="{{ old('heading_1') ?? $data->heading_1 }}">
                                    @error('heading_1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="heading_2">Heading 2 *</label>
                                    <input type="text" class="form-control" name="heading_2" id="heading_2"
                                        placeholder="Enter heading 2" value="{{ old('heading_2') ?? $data->heading_2 }}">
                                    @error('heading_2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="heading_3">Heading 3 *</label>
                                    <input type="text" class="form-control" name="heading_3" id="heading_3"
                                        placeholder="Enter heading 3" value="{{ old('heading_3') ?? $data->heading_3 }}">
                                    @error('heading_3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="register_link">Register Link *</label>
                                    <input type="text" class="form-control" name="register_link" id="register_link"
                                        placeholder="Enter register link"
                                        value="{{ old('register_link') ?? $data->register_link }}">
                                    @error('register_link')
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



                                {{-- <div class="form-group mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="yes" id="brokerCategory1" name="bcategory_1" {{ $data->bcategory_1 == 'yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="brokerCategory1">
                                            {{ getBrokerCategory(1)->name }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="yes" id="brokerCategory2" name="bcategory_2" {{ $data->bcategory_2 == 'yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="brokerCategory2">
                                            {{ getBrokerCategory(2)->name }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="yes" id="brokerCategory3" name="bcategory_3" {{ $data->bcategory_3 == 'yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="brokerCategory3">
                                            {{ getBrokerCategory(3)->name }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="yes" id="brokerCategory4" name="bcategory_4" {{ $data->bcategory_4 == 'yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="brokerCategory4">
                                            {{ getBrokerCategory(4)->name }}
                                        </label>
                                    </div>
                                </div> --}}




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

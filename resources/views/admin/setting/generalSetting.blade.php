@extends('admin.layouts.app_admin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Setting</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Setting</li>
                    <li class="breadcrumb-item active">General Setting</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit General Setting</h5>

                            <!-- Horizontal Form -->
                            <form role="form" action="{{ route('admin.setting.generalSetting.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="author_image">Author Name</label>
                                        <input type="text" class="form-control" id="author_name" placeholder="Enter email" name="author_name" value="{{ old('author_name') ? old('author_name') : setting()->author_name }}">
                                        @error('author_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-md-9 mb-3">
                                            <label for="author_image">Author Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control" id="author_image" name="author_image">
                                                    <label class="custom-file-label" for="author_image">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <img src="{{ asset(setting()->author_image) }}" alt="" class="img-fluid mt-3 border p-1" width="75">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="site_name">Site Name</label>
                                        <input type="text" class="form-control" id="site_name" placeholder="Enter site name" name="site_name" value="{{ old('site_name') ? old('site_name') : setting()->site_name }}">
                                        @error('site_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="footer_about">Footer About</label>
                                        <textarea name="footer_about" id="footer_about" rows="5" class="form-control">{{ old('footer_about') ?? setting()->footer_about }}</textarea>
                                        @error('footer_about')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="wa_link">Whatsapp Link</label>
                                        <input type="text" class="form-control" id="wa_link" placeholder="Enter fb link" name="wa_link" value="{{ old('wa_link') ? old('wa_link') : setting()->wa_link }}">
                                        @error('wa_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="tel_link">Teligram Link</label>
                                        <input type="text" class="form-control" id="tel_link" placeholder="Enter tw link" name="tel_link" value="{{ old('tel_link') ? old('tel_link') : setting()->tel_link }}">
                                        @error('tel_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter ins link" name="email" value="{{ old('email') ? old('email') : setting()->email }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="sk_link">Skype Link</label>
                                        <input type="text" class="form-control" id="sk_link" placeholder="Enter ins link" name="sk_link" value="{{ old('sk_link') ? old('sk_link') : setting()->sk_link }}">
                                        @error('sk_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-md-9 mb-3">
                                            <label for="site_logo">Logo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control" id="site_logo" name="site_logo">
                                                    <label class="custom-file-label" for="site_logo">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <img src="{{ asset(setting()->site_logo) }}" alt="" class="img-fluid mt-3 border p-2">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-md-9 mb-3">
                                            <label for="site_favicon">Favicon (<small class="text-danger">Size: 50*50</small>)</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control" id="site_favicon" name="site_favicon">
                                                    <label class="custom-file-label" for="site_favicon">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <img src="{{ asset(setting()->site_favicon) }}" alt="" class="img-fluid mt-3 border p-2">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection

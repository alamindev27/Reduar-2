@extends('admin.layouts.app_admin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-12">
                    <div class="row">

                        <!-- Revenue Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Total Section</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-list"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalSection }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Revenue Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Total Category</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-list"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $categories }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Revenue Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Total Sub-Category</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-list"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $subCategories }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>





                    </div>
                </div><!-- End Left side columns -->



            </div>
        </section>

    </main>
@endsection

@extends('admin.layouts.app_admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dataTable/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dataTable/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Broker</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Broker</li>
                    <li class="breadcrumb-item active">List Broker</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Broker</h5>
                            <table class="table table-bordered table-striped mb-0" id="example1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Broker</th>
                                        <th>Register Link</th>
                                        <th>Review Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($brokers as $key => $broker)
                                        <tr>
                                            <td class="align-middle">{{ $key < 9 ? '0' . ++$key : ++$key }}</td>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <img src="{{ asset($broker->logo) }}" alt="" style="width: 60px">
                                                    <div class="ms-2">
                                                        <small class="d-block">{{ $broker->heading_1 }}</small>
                                                        <span class="d-block">{{ $broker->heading_2 }}</span>
                                                        <small class="d-block">{{ $broker->heading_3 }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle"><a href="{{ $broker->register_link }}" class="btn btn-primary btn-sm">Register  Link</a></td>
                                            <td class="align-middle"><a href="{{ $broker->review_link }}" class="btn btn-success btn-sm">Review Link</a></td>
                                            <td class="align-middle">
                                                <a href="{{ route('broker.edit', $broker->id) }}" class="btn btn-info btn-sm mx-1" target="_blank">Edit</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="50">No Data Available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('scripts')
    <script src="{{ asset('assets') }}/plugins/dataTable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/dataTable/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/dataTable/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/dataTable/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection

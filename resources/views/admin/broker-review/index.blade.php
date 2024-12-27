@extends('admin.layouts.app_admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dataTable/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dataTable/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Review</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Broker</li>
                    <li class="breadcrumb-item active">List Review</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Review</h5>
                            <table class="table table-bordered table-striped mb-0" id="example1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Broker</th>
                                        <th>Category</th>
                                        {{-- <th>Sub-Category</th> --}}
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $key => $data)
                                        <tr>
                                            <td class="align-middle">{{ $key < 9 ? '0' . ++$key : ++$key }}</td>

                                            <td class="align-middle">
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <img src="{{ asset($data->logo) }}" alt="" style="width: 60px">
                                                    <div class="ms-2">
                                                        {{-- <small class="d-block">{{ $data->heading_1 }}</small> --}}
                                                        <span class="d-block">{{ $data->brokers_name }}</span>
                                                        <small class="d-block"><a href="{{ $data->website_link }}">{{ $data->website_link }}</a></small>
                                                    </div>
                                                </div>
                                            </td>


                                            <td class="align-middle">{{ $data->category->category_name }}</td>

                                            {{-- <td class="align-middle">{{ $data->subcategory->subcategory_name }}</td> --}}
                                            <td class="align-middle">{{ $data->title }}</td>


                                            <td class="align-middle">
                                                <form action="{{ route('broker-review.destroy', $data->id) }}" method="POST" class="text-nowrap">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('broker-review.edit', $data->id) }}" class="btn btn-info btn-sm mx-1" target="_blank">Edit</a>
                                                    <button onclick="return confirm('Are you sure you want to delete this item?');" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
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

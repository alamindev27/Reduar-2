@extends('admin.layouts.app_admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dataTable/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dataTable/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Advertisement</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Advertisement</li>
                    <li class="breadcrumb-item active">List Advertisement</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title">List Advertisement</h5>
                                <div class="form-group">
                                    <label for="">Ad Configure</label>
                                    <select name="" id="" class="form-control" onchange="updateAdConfigure(this)">
                                        {{-- <option value="all" {{ setting()->add_configure == 'all' ? 'selected' : '' }}>All</option> --}}
                                        <option value="top" {{ setting()->add_configure == 'top' ? 'selected' : '' }}>Top</option>
                                        <option value="bottom" {{ setting()->add_configure == 'bottom' ? 'selected' : '' }}>Bottom</option>
                                    </select>
                                </div>
                            </div>

                            <table class="table table-bordered table-striped mb-0" id="example1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date/Time</th>
                                        <th>Link</th>
                                        <th>Image</th>
                                        <th>price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $key => $data)
                                        <tr>
                                            <td class="align-middle">{{ $key < 9 ? '0' . ++$key : ++$key }}</td>
                                            <td class="align-middle">
                                                @if ($data->starting_time == '' && $data->starting_time == '')
                                                    <span>(N/A)</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($data->starting_time)->format('d M, Y'). ' - ' .Carbon\Carbon::parse($data->starting_time)->format('d M, Y') }}
                                                @endif
                                            </td>
                                            <td class="align-middle"><a href="{{ $data->link }}" target="_blank">View link</a></td>
                                            <td class="align-middle">
                                                <a href="{{ asset($data->image) }}">View Banner</a>
                                                <small class="d-block text-danger">size: {{ $data->size }}</small>
                                                {{-- <img src="{{ asset($data->image) }}" alt="" width="120"> --}}
                                            </td>
                                            <td class="align-middle">${{ $data->price }}/month</td>
                                            <td class="align-middle">
                                                @if ($data->status == 'unavailable')
                                                    <span class="badge bg-success">Unavailable</span>
                                                @else
                                                    <span class="badge bg-info">Available</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('advertisement.edit', $data->id) }}" class="btn btn-info btn-sm mx-1" target="_blank">Edit</a>
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

        function updateAdConfigure(el) {
            var status = $(el).val();
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.ad.status') }}',
                data: {
                    status: status
                },
                success: function(data) {
                    console.log(data);

                },
            });
        }
    </script>
@endsection

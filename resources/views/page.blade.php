
@extends('layouts.app')
@section('styles')
<title>{{ $data->name }} | {{ setting()->site_title }}</title>

@endsection
@section('content')
    <div id="main">
        <div class="container-fluid">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-12">
                        <h6 class="d-block d-lg-none section-title border-bottom border-2">{{ $data->name }}</h6>
                        <h4 class="d-none d-lg-block section-title border-bottom border-3">{{ $data->name }}</h4>
                        {!! $data->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
















@extends('layouts.app')
@section('styles')
    <title>Contant | {{ setting()->site_title }}</title>
@endsection
@section('content')
    <div id="main">
        <div class="container-fluid">
            <div class="container">
                <div class="row  my-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="{{ route('frontend.compare') }}" method="get" id="brokerForm">
                                    <div class="row">
                                        <div class="col-lg-3"></div>

                                        <div class="col-lg-3 mb-3">
                                            <div class="form-group">
                                                <label for="oneID">Select Broker</label>
                                                <select name="oneID" id="oneID" class="form-control">
                                                    {{-- <option value="">Select Broker</option> --}}
                                                    @foreach ($reviews as $review)
                                                        <option value="{{ $review->id }}">{{ $review->brokers_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-3">
                                            <div class="form-group">
                                                <label for="twoID">Select Broker</label>
                                                <select name="twoID" id="twoID" class="form-control">
                                                    {{-- <option value="">Select Broker</option> --}}
                                                    @foreach ($reviews as $review)
                                                        <option value="{{ $review->id }}">{{ $review->brokers_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-3">
                                            <div class="form-group">
                                                <label for="threeId">Select Broker</label>
                                                <select name="threeId" id="threeId" class="form-control">
                                                    {{-- <option value="">Select Broker</option> --}}
                                                    @foreach ($reviews as $review)
                                                        <option value="{{ $review->id }}">{{ $review->brokers_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-3 mb-3">
                                            <label for=""> &nbsp; </label>
                                            <button class="btn btn-block w-100 btn-primary" type="submit">Compare</button>
                                        </div> --}}
                                    </div>
                                </form>
                            </div>
                            <div class="card-body" id="compare-broker">
                                <h2 class="text-danger text-center">No Data Available</h2>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>


$(document).ready(function(){
   $('#oneID').change(function(){
       $('#brokerForm').submit();
    });
});
$(document).ready(function(){
   $('#twoID').change(function(){
       $('#brokerForm').submit();
    });
});
$(document).ready(function(){
   $('#threeId').change(function(){
       $('#brokerForm').submit();
    });
});

</script>
@endsection

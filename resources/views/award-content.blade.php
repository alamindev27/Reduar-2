@forelse ($datas as $data)
    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
        <div class="card">
            <div class="card-body text-center">
                <h5>"{{ $data->name }}"</h5>
                <span>Award {{ $data->award_year }}</span>
                <a href="{{ route('frontend.award.details', $data->slug) }}">
                    <img src="{{ asset($data->logo) }}" alt="{{ $data->name }}" class="img-fluid">
                </a>
                <div>
                    <a href="#" class="btn btn-danger">Download</a>
                    <a href="{{ $data->download_link }}" download class="btn btn-dark"> <i class="fa fa-download"></i>
                        Download</a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="text-center">
        <h4 class="text-danger">No Data Available</h4>
    </div>
@endforelse

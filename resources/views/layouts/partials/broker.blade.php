<div class="border border-1 border-dark p-2 mb-2">
    <div class="d-flex justify-content-between align-items-center">
        <img src="{{ asset($item->logo) }}" alt="" style="width:70px; height:70px;">
        <div class="middle-area">
            <small class="text-muted d-block" style="font-size: 12px;">{{ $item->heading_1 }}</small>
            <p class="title fw-bold mb-0">{{ $item->heading_2 }}</p>
            <span class="d-block ratings fw-bold"><i class="fa fa-star"></i> {{ $item->heading_3 }}</span>
        </div>
        <div class="right-area text-center p-2">
            <button class="btn btn-sm btn-primary" onclick="return window.location.href='{{ $item->register_link }}'">REGISTER</button>
            <a target="_blank" href="{{ $item->review_link }}" class="text-white text-decoration-none d-block mb-0 mt-1" style="font-size: 12px;">Read Review</a>
        </div>
    </div>
</div>

<div class="border-bottom">
    <a href="{{ route('frontend.bonus.details', $item->slug) }}" class="d-flex justify-content-between align-items-center p-1 text-decoration-none text-dark py-2">
        <p class="mb-0 bolg-title-1">{{ shorter($item->title, 30) }}</p>
        <small class="blog-date-time-1">{{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</small>
    </a>
</div>


<div class="col-12">
    <div class="border p-2 mt-3">
        <div class="d-block d-lg-flex justify-content-start align-items-center">
            <div class="text-center">
                <a href="{{route('frontend.post.details', $item->slug)}}" class="text-dark text-decoration-none">
                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="blog-image" style="width:150px; height:120px">
                </a>
            </div>
            <div class="blog-middle ms-3">
                <a href="{{route('frontend.post.details', $item->slug)}}" class="text-dark text-decoration-none">
                    <h4>{{ shorter($item->title, 35) }}</h4>
                </a>
                <div>
                    {{ shorter($item->short_description, 120) }}
                </div>
                <div class="d-block d-lg-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="category text-muted fw-bold">{{ $item->category->category_name }}</span>
                        <span class="mx-1 mx-lg-3 text-dark fw-bold"> | </span>
                        <span class="text-muted"><b>Published By:</b> {{ setting()->author_name }}</span>
                    </div>

                    <div class="mt-2 mt-lg-0">
                        <a href="{{ route('frontend.post.details', $item->slug) }}" class="read-more text-center">READ MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

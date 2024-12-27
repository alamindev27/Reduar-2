<meta charset="utf-8">
    {{-- seo --}}
    <meta name='robots' content='max-image-preview:large' />
    <meta name="author" content="{{ setting()->author_name }}" />
    <meta property="site_name" content="{{ setting()->site_name }}" />
    <meta property="site_url" content="{{ Request::url() }}" />
    <link rel="canonical" href="{{ Request::url() }}" />
    <meta property="metatitle" content="{{ setting()->meta_title }}" />
    <meta name="description" content="{{ setting()->meta_description }}" />
    <meta name="keywords" content="{{ setting()->meta_keyword }}"/>
    <meta name="focus_keywords" content="{{ setting()->focus_keyword }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset(setting()->site_favicon) }}" type="image/x-icon">


    <!-- common styles start -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- common styles end -->.
    <!-- main styles -->
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/styles.css">
    @yield('styles')

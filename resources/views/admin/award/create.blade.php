@extends('admin.layouts.app_admin')
@section('styles')


<style>
    .ck-editor__editable[role="textbox"] {
        min-height: 300px;
    }

    .ck .ck-sticky-panel .ck-sticky-panel__content_sticky {
        z-index: 99999 !important;
        margin-top: 0px;
    }

    @media only screen and (min-width: 320px) and (max-width: 768px) {

        .ck .ck-sticky-panel .ck-sticky-panel__content_sticky {
            margin-top: 0px;
        }
    }
</style>
@endsection
@section('content')
    <main id="main" class="main">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="pagetitle">
            <h1>Award</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Award</li>
                    <li class="breadcrumb-item active">Add Award</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('award.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-title">Award Details</h5>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="name">Name *</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Enter name" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="award_year">Award Year *</label>
                                            <select name="award_year" id="award_year" class="form-control">
                                                @php
                                                    $now = Carbon\Carbon::now()->format('Y');
                                                @endphp
                                                <option value="">Select Year</option>
                                                @for ($i = $now - 14; $i <=  $now ; $i++)
                                                    <option {{ old('award_year') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            {{-- <input type="text" class="form-control" name="award_year" id="award_year"
                                                placeholder="Enter award year" value="{{ old('award_year') }}"> --}}
                                            @error('award_year')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="png_download_link">PNG Download Llink *</label>
                                            <input type="text" class="form-control" name="png_download_link" id="png_download_link"
                                                placeholder="Enter png download link" value="{{ old('png_download_link') }}">
                                            @error('png_download_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="psd_download_link">PSD Download Llink *</label>
                                            <input type="text" class="form-control" name="psd_download_link" id="psd_download_link"
                                                placeholder="Enter psd download link" value="{{ old('psd_download_link') }}">
                                            @error('psd_download_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="logo">Logo *</label>
                                            <input type="file" class="form-control" name="logo" id="logo">
                                            @error('logo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="award_type">Award Type *</label>
                                            <select name="award_type" id="award_type" class="form-control">
                                                <option value="">Select Award Type</option>
                                                <option {{ old('award_type') == 'forex_broker' ? 'selected' : '' }} value="forex_broker">Forex Broker Award</option>
                                                <option {{ old('award_type') == 'global_bank' ? 'selected' : '' }} value="global_bank">Global Bank Award</option>
                                                {{-- <option {{ old('award_type') == 'global_online' ? 'selected' : '' }} value="global_online">Global Online Bank</option> --}}
                                                <option {{ old('award_type') == 'pop_trading' ? 'selected' : '' }} value="pop_trading">Pop Trading Award</option>
                                            </select>
                                            @error('award_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="row">

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="sections">Sections *</label>
                                            <select name="sections" class="form-control" id="sections">
                                                <option value="">Select sections</option>
                                                @foreach ($sections as $section)
                                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('sections')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="category">Category *</label>
                                            <select name="category" class="form-control" id="category" onchange="setSubCategory(this)">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="subcategory">Sub-Category *</label>
                                            <select name="subcategory" class="form-control" id="subcategory" disabled>
                                                <option value="">Select Sub-Category</option>
                                            </select>
                                            @error('subcategory')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="title">Short Description *</label>
                                    <textarea name="short_description" id="short_description" rows="5" class="form-control" placeholder="Enter short description">{{ old('short_description') }}</textarea>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>










                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="description">Description *</label>
                                    <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="image">Image</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>


                                <div class="text-center">
                                    <button class="btn btn-success" type="submit">Save & Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/super-build/ckeditor.js"></script>


<script>
    CKEDITOR.ClassicEditor.create(document.getElementById("description"), {
        toolbar: {
            items: [
                'exportPDF', 'exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed',
                '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        heading: {
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },
        placeholder: 'Enter description',
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        htmlSupport: {
            allow: [{
                name: /.*/,
                attributes: true,
                classes: true,
                styles: true
            }]
        },
        htmlEmbed: {
            showPreviews: true
        },
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        mention: {
            feeds: [{
                marker: '@',
                feed: [
                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                    '@chocolate', '@cookie', '@cotton', '@cream',
                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                    '@gummi', '@ice', '@jelly-o',
                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                    '@sesame', '@snaps', '@soufflé',
                    '@sugar', '@sweet', '@topping', '@wafer'
                ],
                minimumCharacters: 1
            }]
        },
        removePlugins: [
            'CKBox',
            'CKFinder',
            'EasyImage',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            'MathType'
        ]
    });
</script>

<script>
    function setSubCategory(el){

        var catId = $(el).val();
        if (catId == '') {
            $('#subcategory').prop('disabled', true);
        } else {
            $('#subcategory').removeAttr('disabled');
        }
        $.ajax({
            type: 'POST',
            url: '{{ route('admin.getSubCategory') }}',
            data: {
                catId: catId
            },
            success: function(data) {
                $('#subcategory').html(data);
                // console.log(data);

            },
        });
    }
</script>
@endsection

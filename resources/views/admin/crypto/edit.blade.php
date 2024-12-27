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

        <div class="pagetitle">
            <h1>Crypto</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Crypto</li>
                    <li class="breadcrumb-item active">Edit Crypto</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Crypto</h5>
                            <form method="POST" action="{{ route('crypto.update', $data->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="coin_name">Coin Name *</label>
                                            <input type="text" class="form-control" name="coin_name" id="coin_name"
                                                placeholder="Enter coin name" value="{{ old('coin_name') ?? $data->coin_name }}">
                                            @error('coin_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="form-group mb-3">
                                                <label class="control-label pt-2" for="coin_icon">Coin Icon *</label>
                                                <input type="file" class="form-control" name="coin_icon" id="coin_icon">
                                                @error('coin_icon')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <img src="{{ asset($data->icon) }}" alt="" width="40" class="mt-3 ms-2 border rounded-circle p-1">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="status">Status *</label>
                                            <select name="status" id="status" class="form-control">
                                                <option {{ $data->status == 'no' ? 'selected' : '' }} value="no"> No</option>
                                                <option {{ $data->status == 'yes' ? 'selected' : '' }} value="yes"> Yes</option>
                                            </select>
                                            @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="origin">Origin *</label>
                                            <input type="text" class="form-control" name="origin" id="origin"
                                                placeholder="Enter origin" value="{{ old('origin') ?? $data->origin }}">
                                            @error('origin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="symbol">Symbol  *</label>
                                            <input type="text" class="form-control" name="symbol" id="symbol"
                                                placeholder="Enter symbol" value="{{ old('symbol') ?? $data->symbol }}">
                                            @error('symbol')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="released_year">Released Year  *</label>
                                            <input type="text" class="form-control" name="released_year" id="released_year"
                                                placeholder="Enter released year" value="{{ old('released_year') ?? $data->released_year }}">
                                            @error('released_year')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="max_supply">Max. Supply  *</label>
                                            <input type="text" class="form-control" name="max_supply" id="max_supply"
                                                placeholder="Enter max supply" value="{{ old('max_supply') ?? $data->max_supply }}">
                                            @error('max_supply')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="showMainMenu">Show Menu *</label>
                                            <select name="showMainMenu" id="showMainMenu" class="form-control">
                                                <option {{ $data->showMainMenu == 'no' ? 'selected' : '' }} value="no"> No</option>
                                                <option {{ $data->showMainMenu == 'yes' ? 'selected' : '' }} value="yes"> Yes</option>
                                            </select>
                                            @error('showMainMenu')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label class="control-label pt-2" for="description">Description *</label>
                                            <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter Description">{{ old('description') ?? $data->description }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-success" type="submit">Save & Update</button>
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
@endsection
